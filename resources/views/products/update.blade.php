
@extends('layouts.main')
@section('content')





<form action="{{ route('products.update', $product->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Pavadinimas:</label>
        <input class="form-control" type="text" name="name" value="{{ $product->name }}">
    </div>
    <div  class="mb-3">
        <label class="form-label">Kaina:</label>
        <input class="form-control" type="text" name="price"  value="{{ $product->price }}">
    </div>
    <button class="btn btn-primary">Atnaujinti</button>
</form>
@endsection
