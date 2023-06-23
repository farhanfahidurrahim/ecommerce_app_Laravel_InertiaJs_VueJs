<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders=Slider::where('status',true)->get();
        $categories=Category::all();
        $products=Product::inRandomOrder()->get();
        $recentProducts=Product::latest()->limit(4)->get();
        return Inertia::render('Frontend/Index', compact('sliders','categories','products','recentProducts'));
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
