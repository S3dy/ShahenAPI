<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class providerpayctrl extends Controller
{
    public function index(Request $req)
    {
    	$name=$req->freelancer_name;
    	$res=DB::collection('provider_payment')->where('freelancer_name',$name)->where('Approve','1')->get();
    	if($res==[])
    	{
    		return "ok";
    	}
    	return $res;
    }
}
