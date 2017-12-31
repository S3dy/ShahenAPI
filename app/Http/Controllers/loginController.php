<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use DB;

class loginController extends Controller
{
    public function login()
    {
           return View('login');
    }
    public function check(Request $req)
    {
        //return "ok";
        //return ['email'=>$req->email,'password'=>$req->password];
       $email_log=$req->email;
        $password_log=$req->password;
        if(!$email_log)
        {
            return "Login failed";
        }
        //$fname_log=$email_log;
        if($email_log!=null && $password_log!=null)
        {
            $col1=DB::collection('cmpny_sign_up')->where('email',$email_log)->first();
            $email_db1=array_get($col1,'email');
            $password_db1=array_get($col1,'password');
            $img2=array_get($col1,'prof_pic1');
            if($email_db1)
            {
                if($email_log==$email_db1 && $password_log==$password_db1)
                {
                    //return "ok";
                    $fname=array_get($col1,'fname');
                    return ['who'=>"Provider",'fname'=>$fname,'prof_pic1'=>$img2];
                }

            }
            else{
            
            $col1=DB::collection('cmpny_sign_up')->where('fname',$email_log)->first(); 
            $fname_db1=array_get($col1,'fname');
            $password_db1=array_get($col1,'password');
            $img2=array_get($col1,'prof_pic1');
            if($email_log==$fname_db1 && $password_log==$password_db1)
                {
                    $fname=array_get($col1,'fname');
                    return ['who'=>"Provider",'fname'=>$fname,'prof_pic1'=>$img2];
                }
            }

            $col2=DB::collection('freelancer_sign_up')->where('email',$email_log)->first();
            $email_db2=array_get($col2,'email');
            $password_db2=array_get($col2,'password');
            $img2=array_get($col2,'prof_pic1');
            if($email_db2)
            {
                if($email_log==$email_db2 && $password_log==$password_db2)
                {
                    $fname=array_get($col2,'uname');
                    return ['who'=>"Freelancer",'fname'=>$fname,'prof_pic2'=>$img2];
                    
                }

            }
            else{
            
            $col2=DB::collection('freelancer_sign_up')->where('uname',$email_log)->first(); 
            $fname_db2=array_get($col2,'uname');
            $password_db2=array_get($col2,'password');
            $img2=array_get($col2,'prof_pic1');
            if($email_log==$fname_db2 && $password_log==$password_db2)
                {
                    
                    $fname=array_get($col2,'uname');
                    return ['who'=>"Freelancer",'fname'=>$fname,'prof_pic2'=>$img2];
                }
            }
            return "Login failed";
           
           
        }
         return "Login failed";   
                                  
    }

}
