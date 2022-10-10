@extends('layouts.app')
@section('content')




<div class="container">

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info">{{ __("Please, buy our production") }}</div>

                    <a class="btn btn-primary" href="{{ route('products.create') }}">{{ __('products.add_product') }}</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nuotrauka</th>
                            <th>{{ __('products.products') }}</th>
                            <th>{{ __('products.price') }}</th>
                            <th>Kategorija</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    @if ($product->img!=null)
                                        <img src="{{ route('image.productImage',$product->id) }}" style=" width: 200px;">
                                    @endif
                                </td>
                                <td>{{ __('products.message',['product'=> $product->name ]) }}</td>
                                <td>{{ trans_choice("products.kaina", $product->price) }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td><a class="btn btn-success" href="{{ route('products.edit', $product->id) }}">Koreguoti</a> </td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Ištrinti</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
