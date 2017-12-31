<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class proposalController extends Controller
{
    public function prop_count(Request $req)
    {
    	$name=$req->name;
    	$col=DB::collection('proposal')->where('name_freelancer','like',"%$name%")->get();
        $max=sizeof($col);
        $col1=DB::collection('message')->where('freelancer_name','like',"%$name%")->get();
        $max1=sizeof($col1);
        return ['offer_count'=>$max1,'proposal_count'=>$max];
    	//return $col;
    }


    public function provider_prop_count(Request $req)
    {
        $name=$req->name;
        $col=DB::collection('proposal')->where('name_provider',$name)->get();
        $max=sizeof($col);
        // return ['provider_proposal_count'=>$max];
        $i=0;
        while($i<$max)
        {
            $title=$col[$i]['job_name'];
            $i++;
            $json[]=$title;
        }
        $vals = array_count_values($json);
        //return $json;
        return ['pro_prop_count'=>$vals];
        //return $vals;
        
    }
    public function free_accept_msg(Request $req)
    {
        $freelancer_name=$req->freelancer_name;
        $job_name=$req->job_name;
        $provider_name=$req->provider_name;
        $myStr = str_random(60);
        //$data=['freelancer'=>'1'];
        $col1=DB::collection('message')->where('freelancer_name',$freelancer_name)->where('provider_name',$provider_name)->where('job_name',$job_name)->update(['project_id'=>$myStr,'project'=>"started"]);
        return "updated";

    }
}
