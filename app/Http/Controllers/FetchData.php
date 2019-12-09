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
        //Makes sure all the instructors are in the database and keeps track of their IDs
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

        //Makes sure all domains are in the database and keeps track of their IDs
        $domains = $course->CollegiateCodes;
        $domainIDs = array();
        foreach($domains as $domain){
          $exists = DB::table("Learning Domains")
            ->select("Domain_ID")
            ->where("Abbr", $domain)
            ->get();
          if($exists->isEmpty()){
            $add = DB::table("Learning Domains")
              ->insertOrIgnore(array("Abbr"=>$domain, "Active"=>1));
            $exists = DB::table("Learning Domains")
              ->select("Domain_ID")
              ->where("Abbr", $domain)
              ->get();
            $added++;
          } else {
            $duplicates++;
          }
          array_push($domainIDs,$exists[0]->Domain_ID);
        }

        //Tests to see if class exists
        $classID = $course->CourseId;
        $courseCode = $course->CourseCode;
        $name = $course->Title;
        $teacherID = !empty($teacherIDs[0])?$teacherIDs[0]:null;
        $teacherID2 = !empty($teacherIDs[1])?$teacherIDs[1]:null;
        $domainID = !empty($domainIDs[0])?$domainIDs[0]:null;
        $domainID2 = !empty($domainIDs[1])?$domainIDs[1]:null;
        $domainID3 = !empty($domainIDs[2])?$domainIDs[2]:null;
        $students = $course->CurrentEnrollment;
        $exists = DB::table("Classes")
          ->select("*")
          ->where("Class_ID",$classID)
          ->where("Course Code",$courseCode)
          ->where("Name",$name)
          ->where("Teacher_ID",$teacherID)
          ->where("Teacher_ID2",$teacherID2)
          ->where("Domain_ID",$domainID)
          ->where("Domain_ID2",$domainID2)
          ->where("Domain_ID3",$domainID3)
          ->where("Num_Students",$students)
          ->get();
        $unupdated = DB::table("Classes")
          ->select("Class_ID")
          ->where("Class_ID",$classID)
          ->get();
        if($exists->isEmpty()){
            if($unupdated->isEmpty()){
              $insert = DB::table("Classes")
                ->insert(array(
                  "Class_ID"=>$classID,
                  "Course Code"=>$courseCode,
                  "Name"=>$name,
                  "Teacher_ID"=>$teacherID,
                  "Teacher_ID2"=>$teacherID2,
                  "Domain_ID"=>$domainID,
                  "Domain_ID2"=>$domainID2,
                  "Domain_ID3"=>$domainID3,
                  "Num_Students"=>$students
                ));
              $added++;
            } else {
              $insert = DB::table("Classes")
                ->where("Class_ID",$classID)
                ->update(array(
                  "Course Code"=>$courseCode,
                  "Name"=>$name,
                  "Teacher_ID"=>$teacherID,
                  "Teacher_ID2"=>$teacherID2,
                  "Domain_ID"=>$domainID,
                  "Domain_ID2"=>$domainID2,
                  "Domain_ID3"=>$domainID3,
                  "Num_Students"=>$students
                ));
              $modified++;
            }
        } else {
          $duplicates++;
        }
      }



      return "Loaded $added new items, modified $modified, and found $duplicates duplicates.";
    }
}
