<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
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
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'image'=>$product->image,
                    'qty'=>1,
                    'price'=>$product->sale_price,
                ]
            ];
            session()->put('cart',$cart);
            return redirect()->route('cart');
        }

        // if again want to same product add to cart
        if (isset($cart[$product_id])) {
            $cart[$product_id]['qty']++;
            session()->put('cart',$cart);
            return redirect()->route('cart');
        }

        //another product add to cart!!
        if (isset($cart)) {
            $cart[$product->id]=[
                'id'=>$product->id,
                'name'=>$product->name,
                'image'=>$product->image,
                'qty'=>1,
                'price'=>$product->sale_price,
            ];
            session()->put('cart',$cart);
            return redirect()->route('cart');
        }

    }

    public function cart()
    {
        $cartSessions=session()->get('cart');
        return Inertia::render('Frontend/Cart', compact('cartSessions'));
    }

    public function removeCart($product_id)
    {
        $cart=session()->get('cart');
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart',$cart);
            return redirect()->route('cart');
        };
    }

    public function upsertQuantity()
    {

    }

    //--------------- Checkout & Order ----------------

    public function checkout()
    {
        return Inertia::render('Frontend/Checkout');
    }

    public function orderPlace()
    {
        return Inertia::render('Frontend/OrderPlace');
    }

}
