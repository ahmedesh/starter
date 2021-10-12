<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
  public function showUserName(){
      return 'Ahmed Emam';
  }

  public function getindex(){

    // $datas=[];
    // $datas['id']=5;
    // $datas['name']='ahmed';
     //================== هي هي لو عملنا كدا =================
     $datas=['id'=> 5 , 'name' => 'ahmed'];
    // $datas=[ 5 , 'ahmed' ];

    // $emptyArray=[99 , 'ali'];
    $emptyArray=[];    // عامله فاضي عشان اعمل بيه تيست ب @forelse

     $obj = new \stdClass();
     $obj -> career = 'software engineer';
     $obj -> experience = 2;

        // return view('index' ,  compact('obj'))->with($data);
        // ================ هي ي لو عملنا كدا ===============
        return view('index' , compact('datas' , 'obj' , 'emptyArray'));

  }
}
