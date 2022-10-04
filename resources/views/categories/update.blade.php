
@extends('layouts.main')
@section('content')





<form action="{{ route('categories.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Pavadinimas:</label>
        <input class="form-control" type="text" name="name" value="{{ $category->name }}">
    </div>


    <button class="btn btn-primary">Atnaujinti</button>
</form>
<hr>
<h5>Prekės kategorijoje</h5>
<table class="table">
@foreach($category->products as $product)
    <tr>
        <td>{{$product->name}}</td>
    </tr>
@endforeach
</table>
<hr>
<h5>Pridėti naują prekę</h5>
<form action="{{route('categories.addProduct', $category->id)}}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-labale">Prekes pavadinimas</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3">
        <label class="form-labale">Kaina</label>
        <input type="text" class="form-control" name="price">
    </div>
    <button class="btn btn-primary">Pridėti</button>
</form>


@endsection
