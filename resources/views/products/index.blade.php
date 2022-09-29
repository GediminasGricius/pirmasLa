@extends('layouts.main')
@section('content')
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
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
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
@endsection
