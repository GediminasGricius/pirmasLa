
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
    <div  class="mb-3">
        <label class="form-label">Kategorija:</label>
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option @if($category->id==$product->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Atnaujinti</button>
</form>
@endsection
