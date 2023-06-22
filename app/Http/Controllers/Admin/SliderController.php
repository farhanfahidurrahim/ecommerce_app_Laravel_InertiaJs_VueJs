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
            'title' => 'required|string|max:25',
            'description' => 'required|string|max:500',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'btn_name' => 'required|string|max:15',
            'btn_link' => 'required|string|max:100',
            'position' => 'required|numeric|max:10',
            'status' => 'required|boolean',
        ]);

        $model = new Slider();
        if ($request->image) {
            $model->image=$request->file('image')->store('images/slider','public');
        }
        $model->title=$request->position;
        $model->description=$request->description;
        $model->btn_name=$request->btn_name;
        $model->btn_link=$request->btn_link;
        $model->position=$request->position;
        $model->status=$request->status;
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
            $model->image=$request->file('slider_image')->store('images/slider','public');
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
