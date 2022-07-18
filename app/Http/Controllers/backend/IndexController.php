<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\models\order;

class IndexController extends Controller
{
    function GetIndex(){
    	$monthNow = carbon::now()->format('m');
    	$yearNow = carbon::now()->format('Y');
    	for ($i=1; $i <= $monthNow ; $i++) {
    		$dl['Tháng '.$i] = order::where('state', 1)->whereMonth('updated_at', $i)->whereYear('updated_at', $yearNow)->sum('total');
    	}
    	$data['dl'] = $dl;
    	$data['dh'] = order::where('state', 2)->count();
    	return view('backend.index', $data);
    }
    function Logout(){
    	Auth::logout();
    	return redirect('login');
    }
}
