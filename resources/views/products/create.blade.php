@extends('layouts.app')
@section('content')




@if ($errors->any())
    <div class="alert alert-danger">
    @foreach($errors->all() as  $error)
        <div>{{ $error }}</div>
    @endforeach
    </div>
@endif


<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Pavadinimas:</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" >
        @if ($errors->has('name'))
            @foreach($errors->get('name') as $error)
                {{ $error }} <br>
            @endforeach
        @endif
    </div>
    <div  class="mb-3">
        <label class="form-label">Kaina:</label>
        <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ old('price') }}" >
        @error('price')
            @foreach($errors->get('price') as $error)
                {{ $error }} <br>
            @endforeach
        @enderror

    </div>
    <div  class="mb-3">
        <label class="form-label">Kategorija:</label>
        <select class="form-control" name="category_id" >
            @foreach($categories as $category)
                <option value="{{$category->id}}" @selected(old('category_id')==$category->id)>{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Pridėti</button>
</form>
@endsection
