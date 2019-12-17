<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Http\Response;

class ReportGenerator extends Controller
{
  public function generateRecent(){
    $csv = "";

    //Selects all the domains
    $domains = DB::table("Learning Domains")
      ->select("Domain_ID", "Name")
      ->get();

    foreach($domains as $domain){
      //Adds the domain name to the csv
      $csv .= $domain->Name . "\n";
      $domainID = $domain->Domain_ID;

      //Selects all the questions associated with that domain
      $questions = DB::table("Questions")
        ->select("Question_ID", "Text")
        ->where("Domain_ID", $domainID)
        ->get();
      foreach($questions as $question){
        $questionID = $question->Question_ID;
        $csv .= $question->Text . "\n";

        //Selects all the information associated with that question ID
        $responses = DB::select(DB::raw("SELECT r.STR, r.SAT, r.NG, r.UNSAT, r.NA FROM Classes c JOIN Submissions s JOIN Responses r
WHERE c.Domain_ID=$domainID
AND r.Question_ID = $questionID
AND s.Class_ID = c.Class_ID
AND c.Teacher_ID = s.Teacher_ID
AND r.Submission_ID = s.Submission_ID
ORDER BY c.Class_ID"));

        //iterates through all responses from this exact domain and
        $i = 1;
        foreach($responses as $response){
          $csv .= "Class $i,"
            . $response->STR . ","
            . $response->SAT . ","
            . $response->NG . ","
            . $response->UNSAT . ","
            . $response->NA . "\n";
          $i++;
        }
      }
      $csv .= "\n";
    }

    $filename = "Reports/" . date('m_d_Y H_i_s') . ".csv";
    Storage::disk("storage")->put($filename, $csv);
    return response()->download(storage_path($filename), "report.csv", ["Location: admin/"]);
}
}
