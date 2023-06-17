<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders=Slider::all();
        return Inertia::render('Admin/Slider/Index', compact('sliders'));
    }

    public function create()
    {
        return Inertia::render('Admin/Slider/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slider_position' => 'required|numeric|max:10',
            'slider_image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $model = new Slider();
        if ($request->slider_image) {
            $model->image=$request->file('slider_image')->store('images/slider','public');
        }
        $model->position=$request->slider_position;
        $model->save();
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $slider=Slider::findOrFail($id);
        return Inertia::render('Admin/Slider/Edit', compact('slider'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'slider_position'=>'required|numeric|max:10',
            'slider_image' => 'sometime|nullable|image|mimes:png,jpg,jpeg',
        ]);
        $model=Slider::findOrFail($id);
        if ($request->hasFile('slider_image')) {
            $model->image=$request->file('slider_image')->store('images/slide','public');
        }
        $model->position=$request->slider_position;
        $model->save();
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $model=Slider::findOrFail($id);
        if (!empty($model->image)) {
            Storage::delete("public/".$model->image);
        }
        $model->delete();
        return redirect()->route('slider.index');
    }
}
