<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class viewController extends Controller
{
	public function view()
	{
	    $col=DB::collection('cmpny_sign_up')->get();
	    return $col;
	 }
	 public function select(Request $req)
	 {
	    $word=$req->word;
	 	$col=DB::collection('jobpost')->where('name_your_job_posting',$word)->first();
	 	//return $name=array_get($col,'name_your_job_posting');
	 	return $col;
	 }
	 public function freelancer_view(Request $req)
	 {
	 	$free_id="14";
	 	return $col=DB::collection('freelancer_sign_up')->where('freelancer_id',$free_id)->first();
	 }
	 public function job_view(Request $req)
	 {
	 	//$job_id="14";
	 	$word=$req->word;
	 	return $col1=DB::collection('jobpost')->where('job_id',$word)->first();
	 }
	 public function pro_select(Request $req)
	 {
	    $word=$req->word;
	 	$col=DB::collection('jobpost')->where('name_your_job_posting',$word)->first();
	 	//return $name=array_get($col,'name_your_job_posting');
	 	return $col;
	 }
	 public function bank_view(Request $req)
	 {
	 	$word=$req->word;
	 	return $col=DB::collection('payment_details')->where('freelancer_name',$word)->get();
	 }
	 public function offerview(Request $req)
	 {
	 	$prop_id=$req->proposal_id;
	    $col=DB::collection('proposal')->where('proposal_id',$prop_id)->first();
	    $col1=DB::collection('message')->where('proposal_id',$prop_id)->first();
	    return array('proposal'=>$col,'message'=>$col1);
	 }
	 public function footview(Request $req)
	 {
	 	//$prop_id=$req->proposal_id;
	 	return $col=DB::collection('footer')->get();
	 }
	 public function edit(Request $req)
	 {
	 	$id=$req->id;
	 	return $col=DB::collection('footer')->where('footer_id',$id)->first();
	 }
	 public function delete(Request $req)
	 {
	 	$id=$req->id;
	 	$rest=DB::collection('footer')->where('footer_id',$id)->delete();
	 	if($rest)
	 	{
	 		return "deleted";
	 	}	
	 }
	 public function siteview1(Request $req)
	 {
	 	return $col1=DB::collection('sitelink')->get();
	 }
	 public function footarea(Request $req)
	 {
	 	$footer=$req->footerlink;
	 	return $col=DB::collection('footer')->where('foot_url',$footer)->first();
	 }
}
