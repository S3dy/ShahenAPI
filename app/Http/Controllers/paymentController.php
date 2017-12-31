<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class paymentController extends Controller
{
   public function add_card(Request $req)
   {


   		$name=$req->name;
    	$card_name=$req->card_name;
    	//$card_lname=$req->card_lname;
    	$card_num=$req->card_num;
    	$card_month=$req->card_month;
    	$card_year=$req->card_year;
    	$cvv_num=$req->cvv_num;
    	// $card_country=$req->card_country;
    	// $card_address=$req->card_address;
    	// $card_op_address=$req->card_op_address;
    	// $card_city=$req->card_city;
    	// $post_code=$req->post_code;
    	// $card_phone=$req->card_phone;
        if($card_name=="" && $card_num =="" && $card_month=="" && $card_year=="" && $cvv_num=="")
        {
            return "failed";
        }
        $myStr = str_random(60);
    	$data=['free_id'=>$myStr,'freelancer_name'=>$name,'card_name'=>$card_name,'card_num'=>$card_num,'card_month'=>$card_month,'card_year'=>$card_year,'cvv_num'=>$cvv_num,'Approve'=>'0'];
    	$insert_data=DB::collection('payment_details')->insert($data);
    	if($insert_data)
    	{
    		return "success";
    	}
        else
        {
            return "failed";
        }
   }
   public function pro_add_card(Request $req)
   {
        $name=$req->name;
        $card_fname=$req->card_fname;
        $card_lname=$req->card_lname;
        $card_num=$req->card_num;
        $card_month=$req->card_month;
        $card_year=$req->card_year;
        $cvv_num=$req->cvv_num;
        $card_country=$req->card_country;
        $card_address=$req->card_address;
        $card_op_address=$req->card_op_address;
        $card_city=$req->card_city;
        $post_code=$req->post_code;
        $card_phone=$req->card_phone;
        $myStr = str_random(60);
        $data=['pro_id'=>$myStr,'provider_name'=>$name,'card_fname'=>$card_fname,'card_lname'=>$card_lname,'card_num'=>'4111111111111111','card_month'=>$card_month,'card_year'=>$card_year,'cvv_num'=>$cvv_num,'card_country'=>$card_country,'card_address'=>$card_address,'card_op_address'=>$card_op_address,'card_city'=>$card_city,'card_phone'=>$card_phone,'Approve'=>'0'];
        $insert_data=DB::collection('provider_payment_details')->insert($data);
        if($insert_data)
        {
            return "success";
        }
        else
        {
            return "failed";
        }
   }
   public function prov_pay(Request $req)
   {
      $fname=$req->fname;
      $pname=$req->pname;
      $jobname=$req->jobname;
      $projid=$req->projid;
      $bid_value=$req->bid_val;
      $fstatus="InProgress";
      $myStr = str_random(60);
         $time=date("h:i:sa");
        $date=date("Y-m-d");
        $col1=DB::collection('message')->where('fstatus','ended')->where('project_id',$projid)->first();
        $status=array_get($col1,'fstatus');
        if($status=="ended")
        {
          $fstatus="Completed";
        }
                $data=['pro_id'=>$myStr,'project_id'=>$projid,'provider_name'=>$pname,'freelancer_name'=>$fname,'job_name'=>$jobname,'bid_value'=>$bid_value,'Approve'=>'0','fstatus'=>$fstatus,'payment_date'=>$date,'payment_time'=>$time];

                $col=DB::collection('message')->where('freelancer_name',$fname)->where('job_name',$jobname)->where('provider_name',$pname)->update(['payment'=>'1']);
                $col1=DB::collection('message')->where('freelancer_name',$fname)->where('job_name',$jobname)->where('provider_name',$pname)->where('fstatus','ended')->update(['payment'=>'2']);

                $insert_data=DB::collection('provider_payment')->insert($data);
                if($insert_data)
                {
                    return "inserted";
                }
   }
   public function display_bill(Request $req)
   {
     $name=$req->name;
     $col1=DB::collection('payment_details')->where('freelancer_name',$name)->get();
     return $col1;
   }
   public function pro_display_bill(Request $req)
   {
     $name=$req->name;
     $col1=DB::collection('provider_payment_details')->where('provider_name',$name)->get();
     return $col1; 
   }
}
