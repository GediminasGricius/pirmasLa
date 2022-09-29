






<form action="{{ route('products.store') }}" method="post">
    @csrf
    <input type="text" name="name"> <br>
    <input type="text" name="price"><br>
    <button>Pridėti</button>
</form>
