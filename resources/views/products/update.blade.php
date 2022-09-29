






<form action="{{ route('products.update', $product->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $product->name }}"> <br>
    <input type="text" name="price" value="{{ $product->price }}"><br>
    <button>Atnaujinti</button>
</form>
