<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderPlace(Request $request)
    {
        //return $request->all();
        $cartSessions=session()->get('cart');
        $cartSubTotal=0;
        $item_count=count($cartSessions);
        foreach ($cartSessions as $cart) {
            $cartSubTotal += $cart['total'];
        }
        if ($request->payment_method=="cod") {
            $data['order_number'] = "ORD-".strtolower(uniqid());
            $data['user_id'] = Auth::user()->id;
            $data['grand_total'] = $cartSubTotal;
            $data['item_count'] = $item_count;
            $data['payment_method'] = $request->payment_method;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            $data['country'] = $request->country;
            $data['city'] = $request->city;
            $data['district'] = $request->district;
            $data['postal_code'] = $request->postal_code;
            $data['created_at'] = Carbon::now();
            $order = Order::insertGetId($data);
            foreach($cartSessions as $cart){
                OrderItem::insert([
                    'order_id' => $order,
                    'product_id' => $cart['id'],
                    'quantity' => $cart['qty'],
                    'price' => $cart['price'],
                    'created_at' => Carbon::now()
                ]);
            }
            session()->forget('cart');
            return redirect('/')->withSuccess('Your Order Has Been Placed!');
        }
    }
}
