<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class jobctrl extends Controller
{
    public function view(Request $req)
    {
    	//return "ok";
    	$y=DB::collection('jobpost')->get();
    	return $y;
    }
    public function jobsearch(Request $req)
    {
        $word=$req->word;
    	return $col=DB::collection('jobpost')->where('name_your_job_posting','like', "%$word%")->get();
    	//return $col;
    }
}
