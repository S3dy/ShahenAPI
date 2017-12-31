<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class freelansignup extends Controller
{
    public function view(Request $req)
    {
    	$col=DB::collection('freelancer_sign_up')->get();
    	// return $col[0]['country'];

 		return $col;
    }
    public function freelancer(Request $req)
    {
    	$name=$req->name;
    	$col1=DB::collection('freelancer_sign_up')->where('uname',$name)->first();
    	return $col1;
    }
}