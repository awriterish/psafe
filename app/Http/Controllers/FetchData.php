<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
      $catalog = Storage::disk("storage")->get("Course Data/newData.json");
      $catalog = json_decode($catalog);
      $courseData = $catalog->value;
      for($i = 0; $i<count($courseData); $i++){
        $course = $courseData[$i];

        //Adds instructors to a variable
        $instructors = $course->Instructors;
        $teacherIDs = array();
        foreach($instructors as $teacher){
          $fullName = $teacher->FirstName . " " . $teacher->LastName;
          $exists = DB::table("Teachers")->
                          select("Teacher_ID")->
                          where("Name",$fullName)->
                          get();
          if($exists->isEmpty()){
            $add = DB::table("Teachers")->
                    insertOrIgnore(array("Name"=>$fullName));
            $exists = DB::table("Teachers")->
                            select("Teacher_ID")->
                            where("Name",$fullName)->
                            get();
            $added++;
          } else {
            $duplicates++;
          }
          array_push($teacherIDs, $exists[0]->Teacher_ID);
        }
      }
      return "Loaded $added new items, modified $modified, and found $duplicates duplicates.";
    }
}
