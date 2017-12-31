<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class financeController extends Controller
{
    public function view(Request $req)
    {
     $v=DB::collection('cmpny_sign_up')->get();
     return $v;
    }

    public function finance(Request $req)
    {
    //return "ok";
     $vs=DB::collection('message')->get();
        $objs=json_decode($vs);
        if($objs==[])
        {
            return "ok";
        }
     // $df=json_decode($v);
     $size=sizeof($vs);
     $j=0;

     while($j<$size)
     {

        $sdf = DB::collection('provider_payment')->where('project_id',$vs[$j]['project_id'])->where('fstatus','Completed')->where('Approve','1')->get();
      $sd = json_decode($sdf);
      if($sd != []){
          break;
      }
  
        $v=DB::collection('provider_payment')->where('project_id',$vs[$j]['project_id'])->get();

      //  $v=DB::collection('provider_payment')->where('provider_name',$vs[$j]['provider_name'])->where('freelancer_name',$vs[$j]['freelancer_name'])->where('job_name',$vs[$j]['job_name'])->get();

        $obj=json_decode($v);
        $sizes=sizeof($v);
        $i=0;
        while($i<$sizes){
        //$id=$v[$i]['provider_id'];
        $provider_name=$v[$i]['provider_name'];
        $freelancer_name=$v[$i]['freelancer_name'];
        $job_name=$v[$i]['job_name'];
        $bid_value=$v[$i]['bid_value'];
        $pro_id=$v[$i]['pro_id'];
        // $hg=DB::collection('provider_payment_details')->where('pro_id',$id)->get();
        // $cardno=$hg[0]['card_num'];
        // $expmonth=$hg[0]['card_month'];
        // $expyear=$hg[0]['card_year'];
        // $cvv=$hg[0]['cvv_num'];
              $fstatus=$v[$i]['fstatus'];
              $Approve=$v[$i]['Approve'];
        // $json[]=array('id'=>$id,'provider_name'=>$provider_name,'freelancer_name'=>$freelancer_name,'job_name'=>$job_name,'bid_value'=>$bid_value,'cardno'=>$cardno,'expmonth'=>$expmonth,'expyear'=>$expyear,'cvv'=>$cvv,'pro_id'=>$pro_id,'fstatus'=>$fstatus,'Approve'=>$Approve);
              $json[]=array('provider_name'=>$provider_name,'freelancer_name'=>$freelancer_name,'job_name'=>$job_name,'bid_value'=>$bid_value,'pro_id'=>$pro_id,'fstatus'=>$fstatus,'Approve'=>$Approve);
        $i++;
        }
        $j++;
     }

    
     echo json_encode($json);



    }
    public function after_pay(Request $req)
    {
     $pro_id=$req->pro_id;
     $col2=DB::collection('provider_payment')->where('pro_id',$pro_id)->update(['Approve'=>'1']);
     return "approve";
    }
}