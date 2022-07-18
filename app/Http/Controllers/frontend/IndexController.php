<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{product, category};

class IndexController extends Controller
{
    function GetIndex(){
    	$data['prd_new'] = product::orderby('id', 'DESC')->where('state',1)->take(8)->get();
    	$data['prd_featered'] = product::where('featured', 1)->where('state',1)->orderby('id', 'DESC')->take(8)->get();
    	return view('frontend.index', $data);
    }
    function GetAbout(){
    	return view('frontend.about');
    }
    function GetContact(){
    	return view('frontend.contact');
    }

    function GetPrdCate($slug_cate){
        // $data['prd'] = product::where('state',1)->first()->prd()->paginate(6);
        $data['prd'] = category::where('slug', $slug_cate)->first()->prd()->paginate(6);
        $data['cate'] = category::all();

        return view('frontend.product.shop', $data);
    }
    function GetFilter(request $r){
        $start = $r->get('start');
        $end = $r->get('end');
        $theloai = $r->get('theloai');
        $data['cate'] = category::all();
        // $data['prd'] = product::whereBetWeen('price',array($start,$end))->where('state',1)->paginate(3);
        $data['prd']= product::query();
        $data['prd']= product::join("category","product.category_id","=","category.id");
        if($theloai != null){
            $data['prd']->where('product.category_id',$theloai);
        }
       if($start!=null and $end!=null){
        $data['prd']-> whereBetWeen('price',array($start,$end));
       }
       $taba=$data['prd']->where('state',1)->paginate(3);


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
