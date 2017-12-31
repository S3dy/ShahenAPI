<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class postjobcontroller extends Controller
{
    public function jobfeed(Request $req)
    {
        $provider_name=$req->provider_name;
        $job_name_before=$req->job_name_before;
        $on_going=$req->on_going;
        $how_many=$req->how_many; 
        $time=date("h:i:sa");
        $col=DB::collection('projects')->insert(['provider_name'=>$provider_name,'job_name_before'=>$job_name_before,'kind_of_project'=>$on_going,'how_many'=>$how_many,'created_on'=>$time]);
        if ($col) 
        {
            return "job feed Succeed";
        }
    }
    public function insert(Request $req)
    {
        $provider_name=$req->provider_name;
    	$job_name=trim($req->job_name);
    	$category=$req->category;
    	$how_many_freelancer=$req->how_many_freelancer;
    	$skills=$req->skills;
    	$payment=$req->payment;
    	$exp_level=$req->exp_level;
    	$how_long=$req->how_long;
    	$time_commitment=$req->time_commitment;
    	$help=$req->help;
    	$freelancer_doing=$req->freelancer_doing;
    	$qualities=$req->qualities;
    	//$files="public/uploads/filename.pdf";
        $apply_job=$req->apply_job;
        $qua_free_type=$req->qua_free_type;
        $qua_job_succ=$req->qua_job_succ;
        $qua_ris=$req->qua_ris;
        $qua_hours=$req->qua_hours;
        $qua_loc=$req->qua_loc;
        $qua_eng_lev=$req->qua_eng_lev;
        $qua_grp=$req->qua_grp;
        $screen_ques=$req->screen_ques;
        $time=date("h:i:sa");
        $date=date("Y-m-d");
        $myStr = str_random(60);
     	// $data=['name_your_job_posting'=>$job_name,'category_and_subcategory'=>$category,'how_many_freelancers'=>$how_many_freelancer,'skills'=>$skills,'payment_by'=>$payment,'exp_level'=>$exp_level,'how_long_expect_this_job'=>$how_long,'time_commitment_for_this_job'=>$time_commitment,'what_help_need_with'=>$help,'what_will_freelancer_doing'=>$freelancer_doing,'qualities_needed_to_success'=>$qualities,'freelancer_preferences'=>$freelancer_preferences,'files'=>$files];
        $data=['job_id'=>$myStr,'provider_name'=>$provider_name,'name_your_job_posting'=>$job_name,'category_and_subcategory'=>$category,'how_many_freelancers'=>$how_many_freelancer,'skills'=>$skills,'payment_by'=>$payment,'exp_level'=>$exp_level,'how_long_expect_this_job'=>$how_long,'time_commitment_for_this_job'=>$time_commitment,'what_help_need_with'=>$help,'what_will_freelancer_doing'=>$freelancer_doing,'qualities_needed_to_success'=>$qualities,'Freelancer Preferences'=>['apply_job'=>$apply_job,'Preferred Qualification'=>['qua_free_type'=>$qua_free_type,'qua_job_succ'=>$qua_job_succ,'qua_ris'=>$qua_ris,'qua_hours'=>$qua_hours,'qua_loc'=>$qua_loc,'qua_eng_lev'=>$qua_eng_lev,'qua_grp'=>$qua_grp,'screen_ques'=>$screen_ques]],'date'=>$date,'time'=>$time];


    	$insert_data=DB::collection('jobpost')->insert($data);
    	if($insert_data)
    	{
    		return $data;
    	}
    }
    public function view(Request $req)
    {
    	$name=$req->name;
    	$col=DB::collection('jobpost')->where('provider_name',$name)->first();
    	$job_name=array_get($col,'name_your_job_posting');
    	$category=array_get($col,'category_and_subcategory');
    	$how_many_freelancer=array_get($col,'how_many_freelancers');
    	$experience=array_get($col,'exp_level');
    	$qualities=array_get($col,'qualities_needed_to_success');
    	$description=array_get($col,'what_help_need_with');
    	$need_deliver=array_get($col,'what_will_freelancer_doing');
        $payment_by=array_get($col,'payment_by');
        $how_long=array_get($col,'how_long_expect_this_job');
    	return ['job_name'=>$job_name,'category'=>$category,'how_many_freelancer'=>$how_many_freelancer,'experience'=>$experience,'qualities'=>$qualities,'description'=>$description,'need_deliver'=>$need_deliver,'payment_by'=>$payment_by,'how_long'=>$how_long];
    }
    public function proposal(Request $req)
    {
        //return "ok";
        $name=$req->name;
        $p_name=$req->p_name;
        $job_name=$req->job_name;
        $job_id=$req->job_id;
        $dura=$req->dura;
        $cover=$req->cover;
        $ux_des=$req->ux_des;
        $ui_des=$req->ui_des;
        $ux_ui=$req->ux_ui;
        $tools=$req->tools;
        $you_receive=$req->you_receive;
        $bid_value=$req->bid_value;
        $time=date("h:i:sa");
        $date=date("Y-m-d");
        $myStr = str_random(60);
        $data=['proposal_id'=>$myStr,'name_freelancer'=>$name,'name_provider'=>$p_name,'job_name'=>$job_name,'job_id'=>$job_id,'dura'=>$dura,'cover'=>$cover,'ux_des'=>$ux_des,'ux_ui'=>$ux_ui,'tools'=>$tools,'you_receive'=>$you_receive,'bid_value'=>$bid_value,'view'=>'0','date'=>$date,'time'=>$time,'proposal'=>""];
        $insert_data=DB::collection('proposal')->insert($data);
        if ($insert_data)
         {
           return $data;
        }
        else
        {
            return "failed";
        }
    }
    public function pro_job_view(Request $req)
    {
        //$name='RajaMohammedAli';
        $name=$req->name;
        $col=DB::collection('jobpost')->where('provider_name',$name)->get();
        $obj=json_decode($col);
        if($obj==[])
        {
               
            return "job not found";
            
        }
        else
        {
            return $col;
        $col1=DB::collection('proposal')->where('name_provider',$name)->get();
        return $col1;
        /*$max=sizeof($col1);
        // return ['provider_proposal_count'=>$max];
        $i=0;
        while($i<$max)
        {
            $title=$col1[$i]['job_name'];
            $i++;
            $json[]=$title;
        }
        $vals = array_count_values($json);
        //return $json;
        $jsoner[]=array('pro_prop_count'=>$vals);
        $jsoner[]=array('jobs'=>$col);
        echo json_encode($jsoner); */
            
        }
        
    }
    
}
