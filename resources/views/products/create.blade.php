@extends('layouts.main')
@section('content')






<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Pavadinimas:</label>
        <input class="form-control" type="text" name="name">
    </div>
    <div  class="mb-3">
        <label class="form-label">Kaina:</label>
        <input class="form-control" type="text" name="price">
    </div>


    <button class="btn btn-primary">Pridėti</button>
</form>
@endsection
