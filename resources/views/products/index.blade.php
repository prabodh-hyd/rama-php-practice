<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<h1> Laravel-crud application </h2>

<div>
    Products
</div>
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
   
                <th>title</th>
                <th>description</th>
                <th>short_notes</th>
                <th>image</th>
                <th>slug</th>
                <th>price</th>
                <th>edit</th>
                <th>status</th>
                <th>Actions</th>

  </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>

            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->short_notes}}</td>
            <td>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" width="100">
                    </td>
            <td>{{$product->slug}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a href="{{route('product.edit',['product'=>$product])}}">Edit</a>
            </td>
            <td>{{ $product->status }}</td>
            <td>
                    <form method="POST" action="{{ route('product.updateStatus', ['product' => $product]) }}" >
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()">
                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
    </tbody>

       
    </table>
</div>
</body>
</html>