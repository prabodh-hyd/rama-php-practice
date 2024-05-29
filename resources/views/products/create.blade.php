<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> create a product</h1>
<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
@csrf
@method('POST')
   <div>
  <label>title</label>
   <input type="text" name="title" placeholder="title" />
</div>
<div>
  <label>description</label>
   <input type="text" name="description" placeholder="description" />
</div>
<div>
  <label>short_notes</label>
   <input type="text" name="short_notes" placeholder="short_notes" />
</div>
<div>
  <label>image</label>
   <input type="file" name="image" placeholder="image" />
</div>
<div>
  <label>slug</label>
   <input type="text" name="slug" placeholder="slug" />
</div>
<div>
  <label>price</label>
   <input type=decimal name="price" placeholder="price" />
</div>
<div>
<label>status</label>
    <input type="text" name="status" placeholder="status" />
</div>
<div>
    <input type="submit" value="save a new product" />
</div>
</form>
</body>
    </html>
