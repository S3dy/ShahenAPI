<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class socialController extends Controller
{
	public function pro_fb(Request $req)
	{
		$name=$req->name;
		$facebook_id=$req->facebook_id;
		$email=$req->email;
		$myStr = str_random(60);
		$col=DB::collection('cmpny_sign_up')->where('facebook_id',$facebook_id)->first();
		$facebook_db=array_get($col,'facebook_id');
		$col1=DB::collection('freelancer_sign_up')->where('facebook_id',$facebook_id)->first();
		$facebook_db1=array_get($col1,'facebook_id');
		$col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
		$email_db=array_get($col2,'email');
		$col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
		$email_db1=array_get($col3,'email');
		if($facebook_db)
		{
			return "Register Failed";
		}
		else if($facebook_db1)
		{
			return "Register Failed";
		}
		elseif ($email_db)
		{
			return "Register Failed";
		}
		elseif ($email_db1) 
		{
			return "Register Failed";
		}
		else
		{
         	$data=['provider_id'=>$myStr,'facebook_id'=>$facebook_id,'fname'=>$name,'email'=>$email,'cname'=>"",'website'=>"",'tagline'=>"",'descri'=>"",'address'=>"",'city'=>"",'zip'=>"",'zone'=>"",'phone'=>"",'vat'=>"",'prof_pic'=>"",'prof_pic1'=>"",'google_id'=>"",'twitter_id'=>"",'lname'=>"",'country'=>""];
         	$insertData = DB::collection('cmpny_sign_up')->insert($data);
         	if($insertData)
        	 {
             return ['fname'=>$name];
         	 }
         }
	   }
	   public function free_fb(Request $req)
	   {
		$name=$req->name;
		$facebook_id=$req->facebook_id;
		$email=$req->email;
		$myStr = str_random(60);
		$col=DB::collection('cmpny_sign_up')->where('facebook_id',$facebook_id)->first();
		$facebook_db=array_get($col,'facebook_id');
		$col1=DB::collection('freelancer_sign_up')->where('facebook_id',$facebook_id)->first();
		$facebook_db1=array_get($col1,'facebook_id');
		$col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
		$email_db=array_get($col2,'email');
		$col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
		$email_db1=array_get($col3,'email');
		if($facebook_db)
		{
			return "Register Failed";
		}
		else if($facebook_db1)
		{
			return "Register Failed";
		}
		elseif ($email_db)
		{
			return "Register Failed";
		}
		elseif ($email_db1) 
		{
			return "Register Failed";
		}
		else
		{
         	$data=['freelancer_id'=>$myStr,'facebook_id'=>$facebook_id,'uname'=>$name,'email'=>$email,'description'=>'','title'=>'','portfolio'=>['title'=>'','description'=>'','image'=>'','files'=>'','contract'=>'','category'=>'','sub_category'=>'','url'=>'','date'=>'','skills'=>'','flags'=>'0'],'certificate'=>['certificate'=>'','provider'=>'','description'=>'','date'=>'','flags'=>'0'],'employment'=>['cmpny_name'=>'','city'=>'','country'=>'','title'=>'','role'=>'','edu_desc'=>'','from_mnth'=>'','from_year'=>'','to_mnth'=>'','to_year'=>'','flags'=>'0'],'school'=>['school_name'=>'','school_from'=>'','school_to'=>'','degree_name'=>'','area_of_study'=>'','school_desc'=>'','flags'=>'0'],"otherExperiences"=>['subject'=>'','description'=>'','flags'=>'0'],'hour_rate'=>"",'you_receive'=>"",'visibility'=>"",'proj_pre'=>"",'exp_lev'=>"",'prof_pic'=>"","skills"=>"",'prof_pic1'=>"",'google_id'=>"",'twitter_id'=>"",'lname'=>"",'country'=>""];
         	$insertData = DB::collection('freelancer_sign_up')->insert($data);
         	if($insertData)
        	 {
             return ['fname'=>$name];
         	 }
         }

	   }
	public function pro_tw(Request $req)
	{
		$name=$req->name;
		$twitter_id=$req->twitter_id;
		$email=$req->email;
		$myStr = str_random(60);
		$col=DB::collection('cmpny_sign_up')->where('twitter_id',$twitter_id)->first();
		$twitter_db=array_get($col,'twitter_id');
		$col1=DB::collection('freelancer_sign_up')->where('twitter_id',$twitter_id)->first();
		$twitter_db1=array_get($col1,'twitter_id');	
		$col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
		$email_db=array_get($col2,'email');
		$col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
		$email_db1=array_get($col3,'email');	
		if($twitter_db)
		{
			return "Register Failed";
		}
		else if($twitter_db1)
		{
			return "Register Failed";
		}
		elseif ($email_db)
		{
			return "Register Failed";
		}
		elseif ($email_db1) 
		{
			return "Register Failed";
		}
		else
		{
		    $data=['provider_id'=>$myStr,'twitter_id'=>$twitter_id,'fname'=>$name,'email'=>$email,'cname'=>"",'website'=>"",'tagline'=>"",'descri'=>"",'address'=>"",'city'=>"",'zip'=>"",'zone'=>"",'phone'=>"",'vat'=>"",'prof_pic'=>"",'prof_pic1'=>"",'facebook_id'=>"",'google_id'=>"",'lname'=>"",'country'=>""];
         	$insertData = DB::collection('cmpny_sign_up')->insert($data);
         	if($insertData)
        		 {
             return ['fname'=>$name];
         	 }
		}
 

	   }
	   public function free_tw(Request $req)
	   {
	   	$name=$req->name;
		$twitter_id=$req->twitter_id;
		$email=$req->email;
		$myStr = str_random(60);
		$col=DB::collection('cmpny_sign_up')->where('twitter_id',$twitter_id)->first();
		$twitter_db=array_get($col,'twitter_id');
		$col1=DB::collection('freelancer_sign_up')->where('twitter_id',$twitter_id)->first();
		$twitter_db1=array_get($col1,'twitter_id');	
		$col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
		$email_db=array_get($col2,'email');
		$col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
		$email_db1=array_get($col3,'email');	
		if($twitter_db)
		{
			return "Register Failed";
		}
		else if($twitter_db1)
		{
			return "Register Failed";
		}
		elseif ($email_db)
		{
			return "Register Failed";
		}
		elseif ($email_db1) 
		{
			return "Register Failed";
		}
		else
		{
		    $data=['freelancer_id'=>$myStr,'twitter_id'=>$twitter_id,'uname'=>$name,'email'=>$email,'description'=>'','title'=>'','portfolio'=>['title'=>'','description'=>'','image'=>'','files'=>'','contract'=>'','category'=>'','sub_category'=>'','url'=>'','date'=>'','skills'=>'','flags'=>'0'],'certificate'=>['certificate'=>'','provider'=>'','description'=>'','date'=>'','flags'=>'0'],'employment'=>['cmpny_name'=>'','city'=>'','country'=>'','title'=>'','role'=>'','edu_desc'=>'','from_mnth'=>'','from_year'=>'','to_mnth'=>'','to_year'=>'','flags'=>'0'],'school'=>['school_name'=>'','school_from'=>'','school_to'=>'','degree_name'=>'','area_of_study'=>'','school_desc'=>'','flags'=>'0'],"otherExperiences"=>['subject'=>'','description'=>'','flags'=>'0'],'hour_rate'=>"",'you_receive'=>"",'visibility'=>"",'proj_pre'=>"",'exp_lev'=>"",'prof_pic'=>"","skills"=>"",'prof_pic1'=>"",'facebook_id'=>"",'google_id'=>"",'lname'=>"",'country'=>""];
         	$insertData = DB::collection('freelancer_sign_up')->insert($data);
         	if($insertData)
        	 {
             return ['fname'=>$name];
         	 }
		}

	   }
     public function pro_go(Request $req)
	{
		$name=$req->name;
		$google_id=$req->google_id;
		$email=$req->email;
		$myStr = str_random(60);
		$col=DB::collection('cmpny_sign_up')->where('google_id',$google_id)->first();
		$google_db=array_get($col,'google_id');
		//return "ok";
		$col1=DB::collection('freelancer_sign_up')->where('google_id',$google_id)->first();
		$google_db1=array_get($col1,'google_id');
		$col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
		$email_db=array_get($col2,'email');
		$col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
		$email_db1=array_get($col3,'email');
		//return "ok";
		if($google_db)
		{
			//return "ok";
			return "Register Failed";
		}
		else if($google_db1)
		{
			//return "ok";
			return "Register Failed";
		}
		elseif ($email_db)
		{
			return "Register Failed";
		}
		elseif ($email_db1) 
		{
			return "Register Failed";
		}
		else
		{
			//return "insert";
         	$dat=['provider_id'=>$myStr,'google_id'=>$google_id,'fname'=>$name,'email'=>$email,'cname'=>"",'website'=>"",'tagline'=>"",'descri'=>"",'address'=>"",'city'=>"",'zip'=>"",'zone'=>"",'phone'=>"",'vat'=>"",'prof_pic'=>"",'prof_pic1'=>"",'facebook_id'=>"",'twitter_id'=>"",'lname'=>"",'country'=>""];
         	//return "ok";
         	$saravana=DB::collection('cmpny_sign_up')->insert($dat);
         	//return "insert";
         	if($saravana)
        	 {
             return ['fname'=>$name];
         	 }
         }

	   }
	   public function free_go(Request $req)
	   {
	   	$name=$req->name;
		$google_id=$req->google_id;
		$email=$req->email;
		$myStr = str_random(60);
		$col=DB::collection('cmpny_sign_up')->where('google_id',$google_id)->first();
		$google_db=array_get($col,'google_id');
		$col1=DB::collection('freelancer_sign_up')->where('google_id',$google_id)->first();
		$google_db1=array_get($col1,'google_id');
		$col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
		$email_db=array_get($col2,'email');
		$col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
		$email_db1=array_get($col3,'email');
		if($google_db)
		{
			return "Register Failed";
		}
		else if($google_db1)
		{
			return "Register Failed";
		}
		elseif ($email_db)
		{
			return "Register Failed";
		}
		elseif ($email_db1) 
		{
			return "Register Failed";
		}
		else
		{
         	$data=['freelancer_id'=>$myStr,'google_id'=>$google_id,'uname'=>$name,'email'=>$email,'description'=>'','title'=>'','portfolio'=>['title'=>'','description'=>'','image'=>'','files'=>'','contract'=>'','category'=>'','sub_category'=>'','url'=>'','date'=>'','skills'=>'','flags'=>'0'],'certificate'=>['certificate'=>'','provider'=>'','description'=>'','date'=>'','flags'=>'0'],'employment'=>['cmpny_name'=>'','city'=>'','country'=>'','title'=>'','role'=>'','edu_desc'=>'','from_mnth'=>'','from_year'=>'','to_mnth'=>'','to_year'=>'','flags'=>'0'],'school'=>['school_name'=>'','school_from'=>'','school_to'=>'','degree_name'=>'','area_of_study'=>'','school_desc'=>'','flags'=>'0'],"otherExperiences"=>['subject'=>'','description'=>'','flags'=>'0'],'hour_rate'=>"",'you_receive'=>"",'visibility'=>"",'proj_pre'=>"",'exp_lev'=>"",'prof_pic'=>"",'skills'=>"",'prof_pic1'=>"",'facebook_id'=>"",'twitter_id'=>"",'lname'=>"",'country'=>""];
         	$insertData = DB::collection('freelancer_sign_up')->insert($data);
         	if($insertData)
        		 {
             return ['fname'=>$name];
         	 }
         }

	   }
	   public function login_fb(Request $req)
	   {
	   	//return "ok";
	   	$facebook_id=$req->facebook_id;
	   	$email=$req->email;
	   	$col=DB::collection('cmpny_sign_up')->where('facebook_id',$facebook_id)->first();
	   	$col1=DB::collection('freelancer_sign_up')->where('facebook_id',$facebook_id)->first();
	   	 $col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
	   	 $col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
	     $email_db=array_get($col2,'email');
	   	 $email_db1=array_get($col3,'email');
	   	 $name_db=array_get($col2,'fname');
	   	 $name_db1=array_get($col3,'uname');
	   	// if($name_db)
	   	// {
	   	// 	return ['fname'=>$name_db,'who'=>'provider'];
	   	// }
	   	// elseif ($name_db1)
	   	//  {
	   	// 	return ['fname'=>$name_db1,'who'=>'freelancer'];
	   	//  }
	   	 if($email_db)
	   	 {
	   	 	return ['fname'=>$name_db,'who'=>'provider'];
	   	 }
	   	 elseif($email_db1)
	   	 {
	   	 	return ['fname'=>$name_db1,'who'=>'freelancer'];
	   	 }
	   	else
	   	 {
	   	 	return "Login failed";
	   	 }
	   }
	   public function login_tw(Request $req)
	   {
	   	 $twitter_id=$req->twitter_id;
	   	 $email=$req->email;
	   	$col=DB::collection('cmpny_sign_up')->where('twitter_id',$twitter_id)->first();
	   	$col1=DB::collection('freelancer_sign_up')->where('twitter_id',$twitter_id)->first();
	   	 $col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
	   	 $col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
	    $email_db=array_get($col2,'email');
	   	$email_db1=array_get($col3,'email');
	   	$name_db=array_get($col2,'fname');
	   	$name_db1=array_get($col3,'uname');   	 
	   	// if($name_db)
	   	// {
	   	// 	return ['fname'=>$name_db,'who'=>'provider'];
	   	// }
	   	// elseif ($name_db1)
	   	//  {
	   	// 	return ['fname'=>$name_db1,'who'=>'freelancer'];
	   	//  }
	   	 if($email_db)
	   	 {
	   	 	return ['fname'=>$name_db,'who'=>'provider'];
	   	 }
	   	 elseif($email_db1)
	   	 {
	   	 	return ['fname'=>$name_db1,'who'=>'freelancer'];
	   	 }
	   	else
	   	 {
	   	 	return "Login failed";
	   	 }
	   }
	   public function login_go(Request $req)
	   {
	    $google_id=$req->google_id;
	    $email=$req->email;
	   	$col=DB::collection('cmpny_sign_up')->where('google_id',$google_id)->first();
	   	$col1=DB::collection('freelancer_sign_up')->where('google_id',$google_id)->first();
	   	$col2=DB::collection('cmpny_sign_up')->where('email',$email)->first();
	   	$col3=DB::collection('freelancer_sign_up')->where('email',$email)->first();
	    $email_db=array_get($col2,'email');
	   	$email_db1=array_get($col3,'email');
	   	$name_db=array_get($col2,'fname');
	   	$name_db1=array_get($col3,'uname');   	 
	   	// if($name_db)
	   	// {
	   	// 	return ['fname'=>$name_db,'who'=>'provider'];
	   	// }
	   	// elseif ($name_db1)
	   	//  {
	   	// 	return ['fname'=>$name_db1,'who'=>'freelancer'];
	   	//  }
	   	 if($email_db)
	   	 {
	   	 	return ['fname'=>$name_db,'who'=>'provider'];
	   	 }
	   	 elseif($email_db1)
	   	 {
	   	 	return ['fname'=>$name_db1,'who'=>'freelancer'];
	   	 }
	   	else
	   	 {
	   	 	return "Login failed";
	   	 }

	   }
}
