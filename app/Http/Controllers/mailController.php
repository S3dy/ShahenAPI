<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;

class mailController extends Controller
{
    public function insert(Request $req)
    {
        if($req->email=="")
        {
            return "Duplicate Email";
        }
        $email=$req->email;
    	$code=$req->code;
        $col1=DB::collection('cmpny_sign_up')->where('email',$email)->first();
        $email_db=array_get($col1,'email');
        $col2=DB::collection('freelancer_sign_up')->where('email',$email)->first();
        $email_db1=array_get($col2,'email');
        if($email_db)
        {
          $data=['email'=>$req->email,'password'=>$req->code];
          $insertData = DB::collection('forget_password')->insert($data);
                  if($insertData)
                    {
                      return "Successfull";
                    }
        }
        elseif($email_db1)
         {
                $data=['email'=>$req->email,'password'=>$req->code];
                $insertData = DB::collection('forget_password')->insert($data);
                  if($insertData)
                    {
                      return "Successfull";
                    }
            
         }
         else
         {
            return "Duplicate Email";
         }
    		
    }
    public function check(Request $req)
    {
    	$code=$req->code;
    	$col1=DB::collection('forget_password')->where('password',$code)->first();
    	$email=array_get($col1,'email');
        if($email)
        {
            DB::collection('forget_password')->where('password',$code)->delete();
            return $email;
        }
        else
        {
            return "Code expired";
        }
     	
    	//$password=array_get($col1,'password');

    }
    public function update(Request $req)
    {
    	$email=$req->email;
    	$password=$req->pwd;
    	$col1=DB::collection('cmpny_sign_up')->where('email', $email)->update(['password'=>$password]);
        if($col1)
        {
    	   return "Successfull";
        }
        else
        {
            $col1=DB::collection('freelancer_sign_up')->where('email', $email)->update(['password'=>$password]);
            return "Successfull";
        }

    }
}
