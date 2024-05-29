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
        'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'slug'=>'required',
        'status'=>'required',
    ]);
    if($request->hasfile('image'))
    {
       $imagePath=$request->file('image') ->store('images','public');
       $data['image']=$imagePath;
    }
    $newProduct=Product::create($data);
    return redirect(route('product.index'));
}

public function edit(Product $product){
   return view('products.edit',['product'=>$product]);

}

public function update(Product $product,Request $request){
    $data=$request->validate([
        'title'=>'required',
        'description'=>'required',
        'price'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        'short_notes'=>'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'slug'=>'required',
        'status'=>'required',
    ]);
    if ($request->hasFile('image')) {
        
        if ($product->image) {
            \Storage::delete('public/' . $product->image);
        }
        $imagePath = $request->file('image')->store('images', 'public');
        $data['image'] = $imagePath;
    }
    $product->update($data);
    return redirect(route('product.index'))->with('success','product updated successfully');

}

public function delete(Product $product){
    $product->status='inactive';
    $product->save();
    return  redirect(route('product.index'))->with('success','product deleted successfully');

}
public function updateStatus(Request $request, Product $product)
{
    $request->validate([
        'status' => 'required|in:active,inactive',
    ]);

    $product->status = $request->status;
    $product->save();

    return redirect()->route('product.index')->with('success', 'Product status updated successfully');
}
 

}