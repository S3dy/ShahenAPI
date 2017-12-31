<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $word=$req->word;
        $sortby=$req->sortby;
        $a=strlen($word);
        if($a > '2' )
        {
     	   //$col=DB::collection('jobpost')->where('category_and_subcategory','like', "%$word%")->get();
            // $col=DB::collection('jobpost')->orwhere(function($query){
            //             $query->where('category_and_subcategory','like',"%$word%");
            //                   ->where('name_your_job_posting','like',"%$word%");
            // })
            // ->get();
            //$col=DB::collection('jobpost')->raw()->find('category_and_subcategory','like', "%$word%")->get();
            $col=DB::collection('jobpost')->where('category_and_subcategory','like', "%$word%")->orwhere('name_your_job_posting','like', "%$word%")->orwhere('what_help_need_with','like', "%$word%")->get();
            if($sortby=="old")
            {
               
                  $col=DB::collection('jobpost')->where('category_and_subcategory','like', "%$word%")->orwhere('name_your_job_posting','like', "%$word%")->orwhere('what_help_need_with','like', "%$word%")->get();
            }
            else
            {
                 $col=DB::collection('jobpost')->where('category_and_subcategory','like', "%$word%")->orwhere('name_your_job_posting','like', "%$word%")->orwhere('what_help_need_with','like', "%$word%")->orderBy('date','desc')->get();
            }
            //return $col;
                                      
        }
        else
        {
            return "not found";
        }
    	//$col1=DB::collection('projects')->where('description','like', "%$word%")->get();
    	//$col2=array_add($col,$col1);
    	//return view('search')->with('users',$col)->with('flags','1')->with('users1',$col1);
    	// $title=array_get($col,'title');
    	// $description=array_get($col,'description');
    	//return ['title'=>$title,'description'=>$description];
        $obj=json_decode($col);
        if($obj==[])
        {
            return "not found";
    	   //return $col;
        }
        elseif($obj)
        {
            return $col;
            // return "ok";
            // return "not found";
        }
    }
    public function free(Request $req)
    {
        $free=$req->free;
        $col=DB::collection('freelancer_sign_up')->where('uname','like',"%$free%")->get();
        return $col;
    }
    public function message(Request $req)
    {
        $name=$req->name;
        $col=DB::collection('proposal')->where('name_provider',$name)->where('view','0')->get();
        // $col1=DB::collection('message')->where('provider_name',$name)->where('freelancer','1')->orwhere('payment',"")->orwhere('payment',"1")->get();
        $col1=DB::collection('message')->where('provider_name',$name)->where('project','started')->orwhere('payment',"")->orwhere('payment',"1")->get();
        $col2=DB::collection('provider_payment_details')->where('provider_name',$name)->first();       
        $json[]=array('proposal'=>$col);
        if($col2!=[])
        {
        $json[]=array('payment'=>$col1,'card'=>$col2);
        }
        else
        {
        $json[]=array('payment'=>$col1,'card'=>'false');
        }
        return $json;
    }
    public function mes(Request $req)
    {
        $freelancer_name=$req->freelancer_name;
        $job_name=$req->job_name;
        $provider_name=$req->provider_name;
        $bid_val=$req->bid_val;
        $proposal_id=$req->proposal_id;
        $col=DB::collection('message')->insert(['freelancer_name'=>$freelancer_name,'job_name'=>$job_name,'provider_name'=>$provider_name,'bid_val'=>$bid_val,'proposal_id'=>$proposal_id,'proposal'=>'Accept','freelancer'=>'0','project'=>"",'fstatus'=>"",'payment'=>"",'project_status'=>""]);
        $col1=DB::collection('proposal')->where('proposal_id',$proposal_id)->update(['proposal'=>'accept']);
        return "message send";
    }
    public function free_msg(Request $req)
    {
        $name=$req->name;
        $col=DB::collection('proposal')->where('name_freelancer',$name)->where('view','0')->get();
        // $col=DB::collection('message')->where('freelancer_name',$name)->where('proposal','Accept')->where('freelancer','0')->get();
        return $col;

    }
    public function pro_search(Request $req)
    {
        $word=$req->word;
        return $col=DB::collection('cmpny_sign_up')->where('fname','like', "%$word%")->get();
    }
    public function free_search(Request $req)
    {
      $word=$req->word;
      return $col=DB::collection('freelancer_sign_up')->where('uname','like', "%$word%")->get();  
    }
    public function comp_search(Request $req)
    {
      $word=$req->word;
      return $col=DB::collection('provider_payment')->where('fstatus','Completed')->where('Approve','1')->orwhere('provider_name','like',"%$word%")->orwhere('freelancer_name','like',"%$word%")->orwhere('job_name','like',"%$word%")->get();
    }
    public function finance_search(Request $req)
    {
        $word=$req->word;
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

        //echo $vs[$j]['project_id'].'<br>';
         $sdf = DB::collection('provider_payment')->where('project_id',$vs[$j]['project_id'])->where('fstatus','Completed')->where('Approve','1')->orwhere('provider_name','like',"%$word%")->orwhere('freelancer_name','like',"%$word%")->orwhere('job_name','like',"%$word%")->get();
      $sd = json_decode($sdf);
      //return "ok";
      if($sd != []){
        $j++;
        continue;
          
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
          //return $rr=$v[$i]['project_id'];
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
}
