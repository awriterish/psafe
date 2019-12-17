<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    public function user(){
      $user = Socialite::driver('azure')->user();
      $name = $user->user["givenName"] . " " . $user->user["surname"];
      $hash = hash('sha256',$name);
      $key = $user->id;
      $teacher = DB::table('Teachers')
        ->select("*")
        ->where("Teacher_ID",$hash)
        ->get();
      if($teacher->isEmpty()){
        return view('noAccount');
      }
    }
}
