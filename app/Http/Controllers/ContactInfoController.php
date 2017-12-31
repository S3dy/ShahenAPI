<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ContactInfoController extends Controller
{
 	public function retrieve(Request $req)
 	{
 		$name=$req->name;
 		$col=DB::collection('freelancer_sign_up')->where('uname',$name)->first();
 		$email=array_get($col,'email');
 		$fname=array_get($col,'fname');
 		$uname=array_get($col,'uname');
 		$portrait=array_get($col,'portrait');
 		$address=array_get($col,'address');
 		$phone=array_get($col,'mobile');
 		return ['email'=>$email,'fname'=>$fname,'uname'=>$uname,'portrait'=>$portrait,'address'=>$address,'mobile'=>$phone];
 	}
}
