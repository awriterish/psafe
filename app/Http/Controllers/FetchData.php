<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FetchData extends Controller
{
    public function domains(){
      $activeDomains = DB::table("Learning Domains")
        ->select("Domain_ID", "Name", "Abbr", "Active")
        ->where("Active",1)
        ->orderBy("Name")
        ->get();

      $inactiveDomains = DB::table("Learning Domains")
        ->select("Domain_ID", "Name", "Abbr", "Active")
        ->where("Active",0)
        ->orderBy("Name")
        ->get();

      //dd($activeDomains);
      return view("barGraph", [
        "active" => $activeDomains,
        "inactive" => $inactiveDomains
      ]);
    }

    public function graph($id){

    }
}
