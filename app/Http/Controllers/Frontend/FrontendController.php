<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders=Slider::where('status',true)->get();
        return Inertia::render('Frontend/Index', compact('sliders'));
    }

    public function shop()
    {
        return Inertia::render('Frontend/Shop');
    }

    public function shopProductDetail()
    {
        return Inertia::render('Frontend/ShopProductDetail');
    }
}
