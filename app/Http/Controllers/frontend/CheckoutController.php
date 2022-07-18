<?php

namespace App\Http\Controllers\frontend;
use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{order,prd_order};
use Cart;
use App\models\Product;

class CheckoutController extends Controller
{
    function GetCheckout(){

    	$data['cart'] = Cart::content();
        $data['total'] = Cart::total(0, "", ".");
    	return view('frontend.checkout.checkout', $data);
    }
    function PostCheckout(CheckoutRequest $r){
        $product = Product::all();

    	$order = new order;
        $order->full = $r->full;
        $order->address = $r->address;
        $order->email = $r->email;
        $order->phone = $r->phone;
        $order->total = Cart::total(0, "", "");
        $order->state = 2;
        $order->save();
        foreach (Cart::content() as $val) {
            $prd = new prd_order;
            $prd->product_id = $val->id;
            $prd->name = $val->name;
            $prd->price = round($val->price, 0);
            $prd->quantity = $val->qty;
            $prd->img = $val->options->img;
            $prd->order_id = $order->id;
            foreach ($product as $v) {
                $prd->code =$v->code;
            }

            // dd(Cart::content());
        $prd->save();
    }
        return redirect("/checkout/complete/".$order->id);
    }
    function GetComplete($order_id){
        $data['order'] = order::find($order_id);
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0, "", ".");
    	return view('frontend.checkout.complete', $data);
    }
}
