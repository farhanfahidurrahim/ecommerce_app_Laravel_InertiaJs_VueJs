<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::all();
        return Inertia::render('Admin/Brand/Index', compact('brands'));
    }

    public function create()
    {
        return Inertia::render('Admin/Brand/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string',
            'brand_image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $model=new Brand();
        if ($request->brand_image) {
            $model->image=$request->file('brand_image')->store('images/brand','public');
        }
        $model->name=$request->brand_name;
        $model->save();
        return redirect()->route('brand.index');
    }
}
