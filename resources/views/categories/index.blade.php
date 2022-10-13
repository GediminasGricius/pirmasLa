@extends('layouts.app')
@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kategorijos</div>
                <div class="card-body">


                    <table class="table">
                        @foreach($categories as $category)

                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    @foreach($category->products as $product)
                                        {{$product->name}},
                                    @endforeach
                                </td>
                                <td>
                                    {{ $category->user->email }}
                                </td>
                                <td>
                                    {{ $category->products->count() }}
                                </td>
                                <td>
                                <td style="width: 250px;">
                                    <a class="btn btn-primary" href="{{ route('products.category', $category->id) }}">Produktai</a>
                                    <a class="btn btn-success" href="{{ route('categories.edit', $category->id) }}">Koreguoti</a>
                                </td>
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
