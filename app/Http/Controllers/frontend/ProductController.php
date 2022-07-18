<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;
use App\models\category;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    function GetDetail($slug_prd){
    	$data['prd'] = product::where('slug', $slug_prd)->first();
    	$data['prd_new'] = product::orderby('id', 'DESC')->take(4)->get();
    	return view('frontend.product.detail', $data);
    }
    function GetShop(request $r){
        $start = $r->get('start');
        $end = $r->get('end');
        $theloai = $r->get('theloai');
    	$taba=$data['prd'] = product::orderby('id', 'DESC')->where('state',1)->paginate(9);
    	$data['cate'] = category::all();
    	return view('frontend.product.shop',[
            'taba'=>$taba,
            'cate'=>$data['cate'],
            'prd'=>$data['prd'],
            'start'=>$start,
            'end'=>$end,
            'theloai'=>$theloai,
        ]);
    }
}
