<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;
use Cart;

class CartController extends Controller
{
    function GetCart(){
    	// dd(Cart::content());
    	$data['cart'] = cart::content();
    	$data['total'] = Cart::total(0, "", '.');
    	return view('frontend.cart.cart', $data);
    }
    function AddCart(request $r){
    	$prd = product::find($r->id_product);
    	Cart::add([
    		'id' => $prd->id,
    		'name' => $prd->name,
    		'qty' => $r->quantity,
    		'price' => $prd->price,
    		'weight' => 0,
            // 'code' => $prd->code,
    		'options' => ['img' => $prd->img],
    	]);
        // dd($r);
    	return redirect('cart');
    }
    function UpdateCart($rowId, $qty){
    	Cart::update($rowId, $qty);
    	return "success";
    }
    function DelCart($rowId){
    	Cart::remove($rowId);
    	return redirect()->back();
    }
}
