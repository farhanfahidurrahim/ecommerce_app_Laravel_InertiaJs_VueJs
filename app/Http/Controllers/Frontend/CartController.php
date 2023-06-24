<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function cart ()
    {
        return Inertia::render('Frontend/Cart');
    }

    public function addCart()
    {

    }
}
