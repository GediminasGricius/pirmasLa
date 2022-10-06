
@extends('layouts.main')
@section('content')



    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as  $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


<form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Pavadinimas:</label>
        <input class="form-control" type="text" name="name" value="{{ (old('name')==null)?$product->name:old('name') }}">
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
    <div class="mb-3">
        <label class="form-label">Prekės nuotrauka:</label>
        <input type="file" class="form-control" name="image">
    </div>
    <button class="btn btn-primary">Atnaujinti</button>
</form>
@endsection
