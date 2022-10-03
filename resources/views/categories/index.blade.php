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
    </tr>
    @endforeach
</table>
