

<a href="{{ route('products.create') }}">Prideti produkta</a>
<table border="1">
    <tr>
        <th>Produktas</th>
        <th>Kaina</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td><a href="{{ route('products.edit', $product->id) }}">Koreguoti</a> </td>
        <td>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button>Ištrinti</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
