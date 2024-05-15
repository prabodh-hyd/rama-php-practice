<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('products.index',['products'=>$products]);
    }
    public function create(){
        return view('products.create');

    }

    public function store(Request $request)
{
    $data=$request->validate([
        'title'=>'required',
        'description'=>'required',
        'price'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        'short_notes'=>'required',
        'image'=>'required',
        'slug'=>'required',
    ]);
    $newProduct=Product::create($data);
    return redirect(route('product.index'));
}
}
  /*
    public function store(Request $request){
        $newpost=Product::create(['title'=>$request->title,
        'short_notes' => $request->short_notes,
            'price' => $request->price
        ]);
        return redirect('product/' . $newPost->id . '/edit');
    }
      public function create(){
        return view('product.add');

    }
    public function show(Product $product)
    {
        //
    }
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product,
        ]);
    }
        public function update(Request $request, Product $product)
        {
            $product->update([
                'title' => $request->title,
                'short_notes' => $request->short_notes,
                'price' => $request->price
            ]);
            
            return redirect('product/' . $product->id . '/edit');
        }
        
        public function destroy(Product $product)
        {
            $product->delete();
            return redirect('product/');
        }*/

