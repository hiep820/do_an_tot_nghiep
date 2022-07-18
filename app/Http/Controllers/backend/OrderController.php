<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\models\order;
use App\models\prd_order;
use Illuminate\Support\Facades\DB;
use App\models\Product;

class OrderController extends Controller
{
    function GetOrder(){
    	$data['order'] = order::where('state', 2)->orderby('updated_at', 'DESC')->paginate(3);
    	return view('backend.order.order', $data);
    }
    function GetDetail($id_order){
    	$data['order'] = order::find($id_order);
    	return view('backend.order.detailorder', $data);
    }
    function GetProcessed(){
    	$data['order'] = order::where('state', 1)->orderby('updated_at', 'DESC')->paginate(3);
    	return view('backend.order.processed', $data);
    }
    function GetCancel(){
        $data['order'] = order::where('state', 0)->orderby('updated_at', 'DESC')->paginate(3);
    	return view('backend.order.cancel', $data);
    }
    function paid($id_order){
        $data['products'] = product::with("prd_order");
        $order = order::find($id_order);
    	$order->state = 1;
    	$order->save();
        foreach ($data['products'] as $product) {
            $total = 0;
            foreach ($product->orders->where('state', 1) as $order) {
                $total += $order->prd_order->where('product_id', $product->id)->sum('quantity');
                $product->soluong = $product->soluong -  $total;
            }
                $product->save();
            }
    	return redirect('/admin/order/processed')->with('thongbao', 'Xử lý đơn hàng thành công!');
    }
    function cancel($id_order) {
        $order = order::find($id_order);
    	$order->state = 0;
    	$order->save();
    	return redirect('/admin/order/cancel')->with('thongbao', 'Đã hủy đơn hàng thành công!');
    }
}
