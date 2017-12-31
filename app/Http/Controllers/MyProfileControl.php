<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MyProfileControl extends Controller
{
    public function prof_view(Request $req)
    {
        $name=$req->name;
        $col1=DB::collection('freelancer_sign_up')->where('uname',$name)->first();
        // $description="I am a web developer";
        // $title="Web developer";
        // $category="web";
        $description=array_get($col1,'description');
        $title=array_get($col1,'title');
        $category=array_get($col1,'category');
        // $insertData = DB::collection('projects')->where('name',$name)->update(['description'=>$description,'title'=>$title,'category'=>$category]);
        return ['description'=>$description,'name'=>$name,'title'=>$title,'category'=>$category];
    }
	public function portfolio(Request $req)
	{
      $name=$req->name;
    	$title=$req->title;
    	$description=$req->description;
        // $image=$req->image;
        // $files=$req->file;
    	$image="image";
    	$files="file";
    	$contract=$req->contract;
    	$category=$req->category;
    	$sub_category=$req->sub_category;
    	$url=$req->url;
    	$date=$req->date;
    	$skills=$req->skills;
        $data=['portfolio'=>['title'=>$title,'description'=>$description,'image'=>$image,'files'=>$files,'contract'=>$contract,'category'=>$category,'sub_category'=>$sub_category,'url'=>$url,'date'=>$date,'skills'=>$skills,'flags'=>'1']];
        $insertData = DB::collection('freelancer_sign_up')->where('uname',$name)->update($data);
       //$insertData = DB::collection('freelancer_sign_up')->where('uname',$name)->insert(array($data));
        //$insertData = DB::collection('projects')->insert($data);
        if($insertData)
        {
        	return $data;
        	return ['portfolio'=>['name'=>$name,'title'=>$title,'description'=>$description,'image'=>$image,'files'=>$files,'contract'=>$contract,'category'=>$category,'sub_category'=>$sub_category,'url'=>$url,'date'=>$date,'skills'=>$skills]];
        }
        else
        {
        	return "failed";
        }

    }
    public function certificate(Request $req)
    {
    	$name=$req->name;
    	$certificate=$req->certificate;
      $provider=$req->provider;
      $description=$req->description;
      $date=$req->date;
        //$col2=DB::collection('projects')->where('name',$name)->first();
        //return $name=($col2,'description');
    	$col1=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["certificate"=>['certificate'=>$certificate,'provider'=>$provider,'description'=>$description,'date'=>$date,'flags'=>'1']]);
    	if($col1)
    	{
    		return "Certificate Added";
    	}
    }

    public function employment(Request $req)
    {
    	$name=$req->name;
    	$cmpny_name=$req->cmpny_name;
    	$city=$req->city;
    	$country=$req->country;
    	$title=$req->title;
    	$role=$req->role;
    	$edu_desc=$req->edu_desc;
        $from_mnth=$req->from_mnth;
        $from_year=$req->from_year;
        $to_mnth=$req->to_mnth;
        $to_year=$req->to_year;
        $edu_desc=$req->edu_desc;
    	$col1=DB::collection('freelancer_sign_up')->where('uname', $name)->update(["employment"=>['cmpny_name'=>$cmpny_name,'city'=>$city,'country'=>$country,'title'=>$title,'role'=>$role,'edu_desc'=>$edu_desc,'from_mnth'=>$from_mnth,'from_year'=>$from_year,'to_mnth'=>$to_mnth,'to_year'=>$to_year,'flags'=>'1']]);
    	 if($col1)
    	{
    		return "Employment Details Added";
    	}
    }
    public function school(Request $req)
    {
    	$name=$req->name;
        $school_name=$req->school_name;
    	$school_from=$req->school_from;
    	$school_to=$req->school_to;
    	$degree_name=$req->degree_name;
    	$area_of_study=$req->area_of_study;
    	$school_desc=$req->school_desc;
    	$col1=DB::collection('freelancer_sign_up')->where('uname', $name)->update(["school"=>['school_name'=>$school_name,'school_from'=>$school_from,'school_to'=>$school_to,'degree_name'=>$degree_name,'area_of_study'=>$area_of_study,'school_desc'=>$school_desc,'flags'=>'1']]);
       	 if($col1)
    	{
    		return "School Details Added";
    	}
    }
    public function otherExp(Request $req)
    {
        $name=$req->name;
        $subject=$req->subject;
        $description=$req->desc;
        $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["otherExperiences"=>['subject'=>$subject,'description'=>$description,'flags'=>'1']]);
        if($col)
        {
            return "Other Experiences Added";
        }
    }
    public function avail(Request $req)
    {
        $name=$req->name;
        $avail=$req->avail;
        $ready=$req->ready;
        $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["availability"=>['available'=>$avail,'ready_for_work'=>$ready]]);
        if($col)
        {
            return "Availability added";
        }
    }
    public function lang(Request $req)
    {
      $name=$req->name;
      $lang=$req->lang;
      $proficiency=$req->proficiency;
      $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["Languages"=>['language'=>$lang,'proficiency'=>$proficiency]]);
      if($col)
      {
        return "Language added";
      }
    }
    public function settings(Request $req)
    {
      $name=$req->name;
      $visibility=$req->visibility;
      $proj_preference=$req->proj_preference;
      $exp_level=$req->exp_level;
      $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["Settings"=>['visibility'=>$visibility,'proj_preference'=>$proj_preference,'exp_level'=>$exp_level]]);
      if($col)
      {
        return "settings added successfully";
      }
    }
    public function video(Request $req)
    {
      $name=$req->name;
      $video_link=$req->video_link;
      $video_type=$req->video_type;
      $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["Video"=>['video_link'=>$video_link,'video_type'=>$video_type]]);
      if($col)
      {
        return "Video added";
      }
    }
    public function desc(Request $req)
    {
      $name=$req->name;
      $desc=$req->desc;
      $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(['description'=>$desc]);
      if($col)
      {
        return "Description added";
      }
    }
    public function titl(Request $req)
    {
      $name=$req->name;
      $titl=$req->titl;
      $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(['title'=>$titl]);
      if($col)
      {
        return "Title added";
      }
    }
    public function rate(Request $req)
    {
      $name=$req->name;
      $hour=$req->hour_rate;
      $rate=$req->you_receive;
      $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(['hour_rate'=>$hour,'you_receive'=>$rate]);
      if ($col) 
      {
          return $rate;
      }
    }
    public function profview(Request $req)
    {
      //return "ok";
      $name=$req->name;
      $col=DB::collection('freelancer_sign_up')->where('uname',$name)->get();
      return $col;
    }
    public function del_portfolio(Request $req)
    {
    $name=$req->name;
        $insertData = DB::collection('freelancer_sign_up')->where('uname',$name)->update(['portfolio'=>['title'=>"",'description'=>"",'image'=>"",'files'=>"",'contract'=>"",'category'=>"",'sub_category'=>"",'url'=>"",'date'=>"",'skills'=>"",'flags'=>'0']]);
        if($insertData)
        {
          return "deleted";
          return $data;
          return ['portfolio'=>['name'=>$name,'title'=>$title,'description'=>$description,'image'=>$image,'files'=>$files,'contract'=>$contract,'category'=>$category,'sub_category'=>$sub_category,'url'=>$url,'date'=>$date,'skills'=>$skills]];
        }
        else
        {
          return "failed";
        }
          return "ok";
    }
    public function del_certificate(Request $req)
    {
      $name=$req->name;
      $certificate=$req->certificate;
      $provider=$req->provider;
      $description=$req->description;
      $date=$req->date;
        //$col2=DB::collection('projects')->where('name',$name)->first();
        //return $name=($col2,'description');
      $col1=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["certificate"=>['certificate'=>"",'provider'=>"",'description'=>"",'date'=>"",'flags'=>'0']]);
      if($col1)
      {
        return "Certificate deleted";
      }
    }
    public function del_employment(Request $req)
    {
      $name=$req->name;
      $col1=DB::collection('freelancer_sign_up')->where('uname', $name)->update(["employment"=>['cmpny_name'=>"",'city'=>"",'country'=>"",'title'=>"",'role'=>"",'edu_desc'=>"",'from_mnth'=>"",'from_year'=>"",'to_mnth'=>"",'to_year'=>"",'flags'=>'0']]);
       if($col1)
      {
        return "Employment Details deleted";
      }
    }
    public function del_school(Request $req)
    {
      $name=$req->name;
      $col1=DB::collection('freelancer_sign_up')->where('uname', $name)->update(["school"=>['school_name'=>"",'school_from'=>"",'school_to'=>"",'degree_name'=>"",'area_of_study'=>"",'school_desc'=>"",'flags'=>'0']]);
      if($col1)
      {
        return "School Details deleted";
      }
    }
    public function del_otherExp(Request $req)
    {
        $name=$req->name;
        $col=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["otherExperiences"=>['subject'=>"",'description'=>"",'flags'=>'0']]);
        if($col)
        {
            return "Other Experiences deleted";
        }
    }
        public function cerdel(Request $req)
    {
      $name=$req->name;
      $col1=DB::collection('freelancer_sign_up')->where('uname',$name)->update(["certificate"=>['certificate'=>"",'provider'=>"",'description'=>"",'date'=>"",'flags'=>'0']]);
      return "ok";
    }
        public function savedet(Request $req)
    {
     $name=$req->name;
      $a=$req->a;
      $b=$req->b;
     $c=$req->c;
      $col1=DB::collection('freelancer_sign_up')->where('uname',$name)->update(['visibility'=>$a,'proj_pre'=>$b,'exp_lev'=>$c]);
      return "ok";
    }
   public function imgpic(Request $req)
    {
      $name=$req->name;
      $img=$req->img;
      $img2=$req->img1;
      $col1=DB::collection('freelancer_sign_up')->where('uname',$name)->update(['prof_pic'=>$img,'prof_pic1'=>$img2]);
      if($col1)
      {
      return "1";
    }
    else
    {
      return "0";
    }
    }
    public function providerimgpic(Request $req)
    {
          $name=$req->name;
          $img=$req->img;
          $img2=$req->img1;
          $col2=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['prof_pic'=>$img,'prof_pic1'=>$img2]);
          if($col2)
          {
          return "1";
        }
        else
        {
          return "0";
        }
    }
    public function skills(Request $req)
    {
      $name=$req->name;
      $skills=$req->skills;
      $col3=DB::collection('freelancer_sign_up')->where('uname',$name)->update(['skills'=>$skills]);
      if($col3)
      {
        return "added";
      }
    }
 }
