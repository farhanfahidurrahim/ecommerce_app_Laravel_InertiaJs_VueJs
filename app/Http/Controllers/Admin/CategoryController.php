<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
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
        ]);
        $model=new Category();
        $model->name=$request->category_name;
        $model->save();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return Inertia::render('Admin/Category/Edit', compact('category'));
    }

    public function update()
    {

    }
}
