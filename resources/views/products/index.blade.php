<!DOCTYPE html>
<body>
<h1> Laravel-crud application </h2>

<div>
    Products
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
</div>

        @endif
    </div>
    <button onclick="create()">create product</button>
    <script>
        function create(){
            var createRouteUrl = "{{ route('product.create') }}";
            window.location.href = createRouteUrl;
        }
        </script>
</div>
<div>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>description</th>
                <th>short_notes</th>
                <th>image</th>
                <th>slug</th>
                <th>price</th>
                <th>edit</th>
                <th>delete</th>
  </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
             <td>{{$product->id}}</td>

            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->short_notes}}</td>
            <td>{{$product->image}}</td>
            <td>{{$product->slug}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a href="{{route('product.edit',['product'=>$product])}}">Edit</a>
            </td>
            <td>
            <form method='post' action="{{route('product.delete',['product'=>$product])}}">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete" />

    </form>


    </td>
        </tr>


        @endforeach
    </tbody>

       
    </table>
</div>
</body>
</html>