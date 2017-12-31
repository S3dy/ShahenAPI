<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class filterController extends Controller
{
    public function filter(Request $req)
    {
    	$filter=$req->filter;
    	$filter1=$req->filter1;
    	$filter2=$req->filter2;
    	$col=DB::collection('jobpost')->where('exp_level','like', "%$filter%")->orwhere('exp_level','like', "%$filter1%")->orwhere('exp_level','like', "%$filter2%")->get();
    	//$col=DB::collection('jobpost')->where('exp_level','like', "%$filter%")->get();
    	return $col;
    }
}
