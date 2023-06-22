<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return Inertia::render('Admin/Category/Index', compact('categories'));
    }

    public function create()
    {
        return Inertia::render('Admin/Category/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required|string|max:25',
            'category_image'=>'required|image|mimes:jpg,jpeg,png',
        ]);
        $model=new Category();
        if ($request->category_image) {
            $model->image=$request->file('category_image')->store('images/category','public');
        }
        $model->name=$request->category_name;
        $model->save();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return Inertia::render('Admin/Category/Edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'category_name'=>'required|string|max:25',
        ]);
        $model=Category::findOrFail($id);
        $model->name=$request->category_name;
        $model->save();

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $model=Category::findOrFail($id);
        if (!empty($model->image)) {
            Storage::delete("public/".$model->image);
        }
        $model->delete();
        return redirect()->route('category.index');
    }
}
