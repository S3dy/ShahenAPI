<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class msg extends Controller
{
   public function insert(Request $req)
    {
    	$ini=$req->ini;
    	$pro=$req->pro;
    	$free=$req->free;
    	$from=$pro."-".$free;
    	$msg=$req->msg;
    	$date=date('Y-m-d');
    	$time=date('h:i:sa');
    	$data=['con'=>$from,'ini'=>$ini,'msg'=>$msg,'date'=>$date,'time'=>$time];
    	$make=DB::collection('msg')->insert($data);
    		return "success";
    }
   public function check(Request $req)
    {
        $pro=$req->pro;
        $free=$req->free;
        $from=$pro."-".$free;  
        $make=DB::collection('msg')->where('con',$from)->orderBy('date','asc')->get(); 
        if($make!=[])
        {
            return $make;
        } 
        else
        {
            return "fail";
        }
    }
   public function tin(Request $req)
    {
    }
}
