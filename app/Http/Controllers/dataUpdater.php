<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class dataUpdater extends Controller
{
    public function updateDomains(Request $request){
      $input = $request->all();
      $domains = DB::table("Learning Domains")
        ->select("*")
        ->get();
      foreach($domains as $domain){
        $abbr = $domain->Domain_ID;
        if(!empty($input[$abbr])){
          DB::table("Learning Domains")
            ->where("Domain_ID",$abbr)
            ->update(["Active"=>1]);
        } else {
          DB::table("Learning Domains")
            ->where("Domain_ID",$abbr)
            ->update(["Active"=>0]);
        }
      }
      return redirect("editDomains/");
    }
}
