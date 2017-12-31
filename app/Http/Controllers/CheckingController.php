<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckingController extends Controller
{
    public function check(Request $req)
    {
    	return ['fname'=>$req->fname,'email'=>$req->email];
    }
}
