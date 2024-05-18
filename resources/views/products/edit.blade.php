<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> Edit a product</h1>
<form method="post" action="{{route('product.update',['product'=>$product])}}">
@csrf
@method('PUT')
   <div>
  <label>title</label>
   <input type="text" name="title" placeholder="title" value="{{$product->title}}" />
</div>
<div>
  <label>description</label>
   <input type="text" name="description" placeholder="description" value="{{$product->description}}" />
</div>
<div>
  <label>short_notes</label>
   <input type="text" name="short_notes" placeholder="short_notes" value="{{$product->short_notes}}" />
</div>
<div>
  <label>image</label>
   <input type="text" name="image" placeholder="image" value="{{$product->image}}"/>
</div>
<div>
  <label>slug</label>
   <input type="text" name="slug" placeholder="slug" value="{{$product->slug}}" />
</div>
<div>
  <label>price</label>
   <input type=decimal name="price" placeholder="price" value="{{$product->price}}"/>
</div>
<div>
    <input type="submit" value="update" />
</div>
</form>
</body>
    </html>
