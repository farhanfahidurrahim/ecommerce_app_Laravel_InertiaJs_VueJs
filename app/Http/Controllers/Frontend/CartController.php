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

    public function addCart($product_id)
    {
        //check product exist!!
        $product=Product::findOrFail($product_id);

        //if exist than, create cart using session!!
        $cart=session()->get('cart');

        //if (product) cart does not exist!!
        if (!$cart) {
            $cart=[
                $product->id=>[
                    'name'=>$product->name,
                    'image'=>$product->image,
                    'qty'=>$product->qty,
                    'sale_price'=>$product->sale_price,
                ]
            ];
            session()->put('cart',$cart);
            return redirect()->route('cart');
        }
    }
}
