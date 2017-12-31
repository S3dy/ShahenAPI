<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class adminctrl extends Controller
{
    public function sitelinksocial(Request $req)
    {
    	$google=$req->google;
    	$facebook=$req->facebook;
    	$twitter=$req->twitter;
    	$linkedin=$req->linkedin;
    	$youtube=$req->youtube;
    	$googlestatus=$req->googlestatus;
    	$facebookstatus=$req->facebookstatus;
    	$twitterstatus=$req->twitterstatus;
    	$linkedinstatus=$req->linkedinstatus;
    	$youtubestatus=$req->youtubestatus;
    	// $insertdata=DB::collection('sitelink')->insert(['google'=>$google,'facebook'=>$facebook,'twitter'=>$twitter,'linkedin'=>$linkedin,'youtube'=>$youtube,'status'=>'']);
    	// $insertdata=DB::collection('sitelink')->update(['google'=>$google,'facebook'=>$facebook,'twitter'=>$twitter,'linkedin'=>$linkedin,'youtube'=>$youtube,'status'=>'']);
    	$data=['google'=>['google_sitelink'=>$google,'status'=>$googlestatus],'facebook'=>['facebook_sitelink'=>$facebook,'status'=>$facebookstatus],'twitter'=>['twitter_sitelink'=>$twitter,'status'=>$twitterstatus],'linkedin'=>['linked_sitelink'=>$linkedin,'status'=>$linkedinstatus],'youtube'=>['youtube_sitelink'=>$youtube,'status'=>$youtubestatus]];
    	$insertdata=DB::collection('sitelink')->update($data);
    	if($insertdata)
    	{
    		return "inserted";
    	}
    }
    public function sitelinkmobile(Request $req)
    {
    	$android=$req->android;
    	$ios=$req->ios;
    	$androidstatus=$req->androidstatus;
    	$iosstatus=$req->iosstatus;
    	$insertdata=DB::collection('sitelink')->update(['android'=>['android_sitelink'=>$android,'status'=>$androidstatus],'ios'=>['ios_sitelink'=>$ios,'status'=>$iosstatus]]);
    	if($insertdata)
    	{
    		return "inserted";
    	}
    }
    public function siteview(Request $req)
    {
    	$col=DB::collection('sitelink')->get();
    	$col1=DB::collection('footer')->get();
    	return array('sitelink'=>$col,'footer'=>$col1);
    }
    public function addfoot(Request $req)
    {
    	$foot_select=$req->foot_select;
    	$foot_change=$req->foot_change;
    	$foot_name=$req->foot_name;
    	$page_title=$req->page_title;
    	$foot_type=$req->foot_type;
    	$foot_url=$req->foot_url;
    	$f = $foot_url['0'];
    	if( $f == "/"){
   			$foot_url = substr($foot_url,1);
    	}
    	$col=DB::collection('footer')->where('foot_name',$foot_name)->first();
    	$name=array_get($col,'foot_name');
    	$url=array_get($col,'foot_url');
    	if($name)
    	{
    		return "failed";
    	}
    	elseif($url)
    	{
    		return "failed";
    	}
    	$foot_textarea=$req->foot_textarea;
    	$myStr = str_random(60);
    	$insertdata=DB::collection('footer')->insert(['footer_id'=>$myStr,'foot_select'=>$foot_select,'foot_change'=>$foot_change,'foot_name'=>$foot_name,'page_title'=>$page_title,'foot_type'=>$foot_type,'foot_url'=>$foot_url,'foot_textarea'=>$foot_textarea]);
    	if($insertdata)
    	{
    		return "inserted";
    	}
    }
    public function editfoot(Request $req)
    {
    	$foot_select=$req->foot_select;
    	$foot_change=$req->foot_change;
    	$foot_name=$req->foot_name;
    	$page_title=$req->page_title;
    	$foot_type=$req->foot_type;
    	$foot_url=$req->foot_url;
    	$f = $foot_url['0'];
    	if( $f == "/"){
   			$foot_url = substr($foot_url,1);
    	}
    	$foot_textarea=$req->foot_textarea;
    	$insertdata=DB::collection('footer')->where('foot_name',$foot_name)->update(['foot_select'=>$foot_select,'foot_name'=>$foot_name,'foot_change'=>$foot_change,'page_title'=>$page_title,'foot_type'=>$foot_type,'foot_url'=>$foot_url,'foot_textarea'=>$foot_textarea]);
    	if($insertdata)
    	{
    		return "inserted";
    	}
    }
}
