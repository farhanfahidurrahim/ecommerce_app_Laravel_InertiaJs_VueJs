<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return Inertia::render('Admin/Product/Index', compact('products'));
    }

    public function create()
    {
        return Inertia::render('Admin/Product/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required|string|max:50',
            'product_image'=>'required|image|mimes:png,jpg,jpeg',
            'qty'=>'required|integer|max:9000',
            'price'=>'required',
            'sale_price'=>'required',
            'description'=>'required',
        ]);
        $model=new Product();
        if ($request->product_image) {
            $model->image=$request->file('product_image')->store('images/product','public');
        }
        $model->name=$request->product_name;
        $model->qty=$request->qty;
        $model->price=$request->price;
        $model->sale_price=$request->sale_price;
        $model->description=$request->description;
        $model->save();
        return redirect()->route('product.index');
    }

    public function edit(Request $request,$id)
    {
        $product=Product::findOrFail($id);
        return Inertia::render('Admin/Product/Edit', compact('product'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'product_name'=>'required|string|max:50',
            'product_image'=>'nullable|image|mimes:png,jpg,jpeg',
            'qty'=>'required|integer|max:9000',
            'price'=>'required',
            'sale_price'=>'required',
            'description'=>'required',
        ]);
        $model=Product::findOrFail($id);
        if ($request->hasFile('product_image')) {
            $model->image=$request->file('product_image')->store('images/product','public');
        }
        $model->name=$request->product_name;
        $model->qty=$request->qty;
        $model->price=$request->price;
        $model->sale_price=$request->sale_price;
        $model->description=$request->description;
        $model->save();
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $model=Product::findOrFail($id);
        if (!empty($model->image)) {
            Storage::delete('public/'.$model->image);
        }
        $model->delete();
        return redirect()->back();
    }
}
