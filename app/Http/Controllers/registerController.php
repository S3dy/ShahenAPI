<?php

namespace App;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\View;
use DB;


class registerController extends Controller
{
    public function register()
    {

    	return view('reg');
    }
    public function insert(Request $req)

    {
            if($req->fname=="" && $req->lname=="" && $req->email=="" && $req->password=="")  
            {
                return "Register failed";
            }      
            $email=$req->email;
            $fname=$req->fname;
            $myStr = str_random(60);
            $col2=DB::collection('freelancer_sign_up')->where('email',$email)->first();
            $email_db2=array_get($col2,'email');
            $col=DB::collection('cmpny_sign_up')->where('email',$email)->first();
            $email_db=array_get($col,'email');
            $col1=DB::collection('cmpny_sign_up')->where('fname',$fname)->first();
            $fname_db=array_get($col1,'fname');
           //return ['fname'=>$req->fname,'email'=>$req->email];
            if($email_db)
            {
                return "Email already exist";
            }
            elseif($fname_db)
            {
                return "Username already exist";
                      
            }
            elseif($email_db2)
            {
                return "Email already exist";
            }
            else
            {
                    $data=['provider_id'=>$myStr,'fname'=>$req->fname,'lname'=>$req->lname,'cmpnyname'=>$req->cmpnyname,'country'=>$req->country,'email'=>$req->email,'password'=>$req->password,'cname'=>"",'website'=>"",'tagline'=>"",'descri'=>"",'address'=>"",'city'=>"",'zip'=>"",'zone'=>"",'phone'=>"",'vat'=>"",'facebook_id'=>"",'google_id'=>"",'twitter_id'=>"",'prof_pic'=>"",'prof_pic1'=>""];
                    $insertData = DB::collection('cmpny_sign_up')->insert($data);
                    if($insertData)
                    {
                        return ['fname'=>$req->fname,'lname'=>$req->lname,'cmpnyname'=>$req->cmpnyname,'country'=>$req->country,'email'=>$req->email,'password'=>$req->password];
                        return "Inserted in Company table";
                    }
            }
            // else
            // {
            //     return "Email already exist";
            // }
    }
    public function free_lancer_insert(Request $req)
    {
            //$req->how_about;
            if($req->fname=="" && $req->lname=="" && $req->uname=="" && $req->email=="" && $req->password=="")  
            {
                return "Register failed";
            } 
            $email=$req->email;
            $fname=$req->uname;
            $myStr = str_random(60);
            $col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
            $email_db2=array_get($col2,'email');
            $col=DB::collection('freelancer_sign_up')->where('email',$email)->first();
            $email_db=array_get($col,'email');
            $col1=DB::collection('freelancer_sign_up')->where('uname',$fname)->first();
            $fname_db=array_get($col1,'uname'); 
            if($email_db)
            {
                return "Email already exist";
            }
            elseif($fname_db)
            {
                return "Username already exist";
            } 
            elseif ($email_db2)
            {
                return "Email already exist";
            }
            else
            {   
             $data=['freelancer_id'=>$myStr,'fname'=>$req->fname,'lname'=>$req->lname,'uname'=>$req->uname,'country'=>$req->country,'email'=>$req->email,'password'=>$req->password,'description'=>'','title'=>'','portfolio'=>['title'=>'','description'=>'','image'=>'','files'=>'','contract'=>'','category'=>'','sub_category'=>'','url'=>'','date'=>'','skills'=>'','flags'=>'0'],'certificate'=>['certificate'=>'','provider'=>'','description'=>'','date'=>'','flags'=>'0'],'employment'=>['cmpny_name'=>'','city'=>'','country'=>'','title'=>'','role'=>'','edu_desc'=>'','from_mnth'=>'','from_year'=>'','to_mnth'=>'','to_year'=>'','flags'=>'0'],'school'=>['school_name'=>'','school_from'=>'','school_to'=>'','degree_name'=>'','area_of_study'=>'','school_desc'=>'','flags'=>'0'],"otherExperiences"=>['subject'=>'','description'=>'','flags'=>'0'],'facebook_id'=>"",'google_id'=>"",'twitter_id'=>"",'hour_rate'=>"",'you_receive'=>"",'visibility'=>"",'proj_pre'=>"",'exp_lev'=>"",'prof_pic'=>"",'skills'=>"",'prof_pic1'=>""];
                $insertData = DB::collection('freelancer_sign_up')->insert($data);
                if($insertData)
                {
                    return ['fname'=>$req->fname,'lname'=>$req->lname,'uname'=>$req->uname,'country'=>$req->country,'email'=>$req->email,'password'=>$req->password];
                    return "Inserted in Freelancer table";
                }
             }       
    }
}
