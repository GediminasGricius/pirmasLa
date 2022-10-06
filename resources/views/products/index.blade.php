@extends('layouts.app')
@section('content')




<div class="container">

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/image.jpg') }}">

                    <a class="btn btn-primary" href="{{ route('products.create') }}">Prideti produkta</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Produktas</th>
                            <th>Kaina</th>
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
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
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
