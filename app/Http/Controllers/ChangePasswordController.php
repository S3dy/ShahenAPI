<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ChangePasswordController extends Controller
{
    public function change(Request $req)
    {
    	$name=$req->name;
    	$oldpass=$req->oldpass;
    	$newpass=$req->newpass;
    	$col=DB::collection('freelancer_sign_up')->where('uname',$name)->first();
    	$passwordb=array_get($col,'password');
    	if($oldpass==$passwordb)
    	{
    		$col1=DB::collection('freelancer_sign_up')->where('uname',$name)->update(['password'=>$newpass]);
    		if($col1)
    		{
    			return "Password Updated Successfully";

    		}
    	}
    	else
    	{
    		return "Kindly Check Your password";
    	}

    }
    public function pro_change(Request $req)
    {
        //return "ok";
        $name=$req->name;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->first();
        $passwordb=array_get($col,'password');
        if($oldpass==$passwordb)
        {
            $col1=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['password'=>$newpass]);
            if($col1)
            {
                return "Password Updated Successfully";

            }
        }
        else
        {
            return "Kindly Check Your password";
        }

    }
}
