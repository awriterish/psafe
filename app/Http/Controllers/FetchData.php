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
      return view("graphPage", [
        "active" => $activeDomains,
        "inactive" => $inactiveDomains
      ]);
    }

    public function graph($id){
      $outcomes = DB::select(DB::raw("SELECT Q.Text, R.Question_ID, SUM(R.STR) as STR, SUM(R.SAT) as SAT, SUM(R.NG) as NG, SUM(R.UNSAT) as UNSAT, SUM(R.NA) as NA
FROM Questions Q JOIN Responses R
WHERE Q.Domain_ID = $id
AND R.Question_ID = Q.Question_ID
GROUP BY R.Question_ID"));
      return view("barGraph", [
        "outcomes" => $outcomes
      ]);
    }

    public function load(){
      $added = 0;
      $modified = 0;
      $duplicates = 0;
      return "Loaded $added new classes, modified $modified, and found $duplicates duplicate classes.";
    }
}
