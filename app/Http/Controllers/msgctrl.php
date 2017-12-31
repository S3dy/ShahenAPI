<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class msgctrl extends Controller
{
    public function view(Request $req)
    {
    	$fname=$req->freelancer_name;
    	//$collect=DB::collection('message')->where('freelancer_name',$fname)->where('freelancer','1')->get();
        $collect=DB::collection('message')->where('freelancer_name',$fname)->where('project','started')->get();
    	if($collect==[])
    	{
    		return "ok";
    	}
    	return $collect;
    }
    public function index(Request $req)
    {
    	$fname=$req->freelancer_name;
    	$jname=$req->job_name;
    	$pname=$req->provider_name;
    	$col=DB::collection('message')->where('freelancer_name',$fname)->where('job_name',$jname)->where('provider_name',$pname)->update(['payment'=>'1','fstatus'=>'ended']);
        /*$col1=DB::collection('provider_payment')->where('freelancer_name',$fname)->where('job_name',$jname)->where('provider_name',$pname)->update(['fstatus'=>'Completed']);*/
    	if($col==[])
    	{
    		return "ok";
    	}
    	return "success";
	}                     
	public function update(Request $req)     
	{
		//$x=DB::collection('message')->where('fstatus','completed')->get();
        $y=DB::collection('provider_payment')->where('fstatus','Completed')->where('Approve','1')->get();
        if($y==[])
        {
            return "ok";
        }
        else
        {
            return $y;
        }

		// if($x==[])
  //   	{
  //   		return "ok";
  //   	}              
		// return $x;

	}

        public function ind(Request $req)
          {
            $pname=$req->provider_name;
          //  $sd=DB::collection('message')->where('provider_name',$pname)->where('fstatus','completed')->get();
            $sd=DB::collection('provider_payment')->where('provider_name',$pname)->orderBy('job_name','asc')->get();
            if($sd==[])
              {
                return "ok";
              }
            return $sd;
          }

// 	public function ind(Request $req)
// 	{
// 		$pname=$req->provider_name;
// 		$sd=DB::collection('message')->where('provider_name',$pname)->where('fstatus','completed')->get();
// 		if($sd==[])
//     	{
//     		return "ok";
//     	}
// 		return $sd;
// 	}
    

}
