<table border="1">
    @foreach($categories as $category)
    <tr>




        <td>{{$category->name}}</td>
        <td>
            @foreach($category->products as $product)
                {{$product->name}},
            @endforeach
        </td>
        <td>
            {{ $category->user->email }}
        </td>
        <td>
        <td><a class="btn btn-success" href="{{ route('categories.edit', $category->id) }}">Koreguoti</a> </td>
        </td>
    </tr>
    @endforeach
</table>
