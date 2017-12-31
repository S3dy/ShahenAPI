<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class providerProfileController extends Controller
{
    public function pro_name(Request $req)
    {
        $name=$req->name;
        $lname=$req->lname;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['lname'=>$lname]);
            return array('fname'=>$fname,'lname'=>$lname);
    }
    public function pro_email(Request $req)
    {
        $name=$req->name;
        $email=$req->email;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['email'=>$email]);
        return $email;
    }
    public function pro_cname(Request $req)
    {
        $name=$req->name;
        $cname=$req->cname;
        $website=$req->website;
        $tagline=$req->tagline;
        $descri=$req->descri;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['cname'=>$cname,'website'=>$website,'tagline'=>$tagline,'descri'=>$descri]);
        return $cname;
        // if($col)
        // {
        //  return "updated";
        // }
    }
    public function pro_add(Request $req)
    {
        $name=$req->name;
        $country=$req->country;
        $address=$req->address;
        $city=$req->city;
        $zip=$req->zip;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['country'=>$country,'address'=>$address,'city'=>$city,'zip'=>$zip]);
        return $country;
        // if($col)
        // {
        //  return "updated";
        // }
    }
    public function pro_zone(Request $req)
    {
        $name=$req->name;
        $zone=$req->zone;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['zone'=>$zone]);
        return $zone;
        // if($col)
        // {
        //  return "updated";
        // }
    }
    public function pro_phone(Request $req)
    {
        $name=$req->name;
        $phone=$req->phone;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['phone'=>$phone]);
        return $phone;
        // if($col)
        // {
        //  return "updated";
        // }
    }
    public function pro_vat(Request $req)
    {
        $name=$req->name;
        $vat=$req->vat;
        $col=DB::collection('cmpny_sign_up')->where('fname',$name)->update(['vat'=>$vat]);
        return $vat;
        // if($col)
        // {
        //  return "updated";
        // }
    }
    public function view(Request $req)
    {
        $fname=$req->name;
        return $col=DB::collection('cmpny_sign_up')->where('fname',$fname)->first();

    }
}
