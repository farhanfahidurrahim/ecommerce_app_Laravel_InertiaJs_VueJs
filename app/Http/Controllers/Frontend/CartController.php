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
                    'total' => $product->sale_price,
                ]
            ];
            session()->put('cart',$cart);
            return redirect()->route('cart');
        }

        // if again want to same product add to cart
        if (isset($cart[$product_id])) {
            $cart[$product_id]['qty']++;
            $cart[$product_id]['total'] = $cart[$product_id]['qty'] * $cart[$product_id]['price'];
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
        $cartSubTotal=0;
        foreach($cartSessions as $cart){
            $cartSubTotal +=$cart['total'];
        }
        return Inertia::render('Frontend/Cart', compact('cartSessions','cartSubTotal'));
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

    public function upsertQuantity(Request $request)
    {
        $cart=session()->get('cart');
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['qty']=$request->qty;
            session()->put('cart',$cart);
            return redirect()->route('cart');
        };
    }

    //--------------- Checkout & Order ----------------

    public function checkout()
    {
        $cartSessions=session()->get('cart');
        $cartSubTotal=0;
        foreach($cartSessions as $cart){
            $cartSubTotal +=$cart['total'];
        }
        return Inertia::render('Frontend/Checkout', compact('cartSessions','cartSubTotal'));
    }

    public function orderPlace(Request $request)
    {
        return $request->all();
        return Inertia::render('Frontend/OrderPlace');
    }

}
