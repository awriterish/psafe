<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
	public function submit($id) {
		dd("hello world!");
	}
	
    public function survey($id) {
		$ClassesToSurvey =[];

		//Class Queries
		$idMatch1 = DB::table('Classes')
						->select('Classes.Course Code as Class_Name', 'Classes.Class_ID',
								'Learning Domains.Abbr as Domain_Name', 'Learning Domains.Domain_ID', 'Classes.Num_Students')
						->join('Learning Domains', 'Classes.Domain_ID', '=', 'Learning Domains.Domain_ID')
						->where('Learning Domains.Active', 1)
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();

		$idMatch2 = DB::table('Classes')
						->select('Classes.Course Code as Class_Name', 'Classes.Class_ID',
								'Learning Domains.Abbr as Domain_Name', 'Learning Domains.Domain_ID', 'Classes.Num_Students')
						->join('Learning Domains', 'Classes.Domain_ID2', '=', 'Learning Domains.Domain_ID')
						->where('Learning Domains.Active', 1)
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();
		$idMatch3 = DB::table('Classes')
						->select('Classes.Course Code as Class_Name', 'Classes.Class_ID',
								'Learning Domains.Abbr as Domain_Name', 'Learning Domains.Domain_ID', 'Classes.Num_Students')
						->join('Learning Domains', 'Classes.Domain_ID3', '=', 'Learning Domains.Domain_ID')
						->where('Learning Domains.Active', 1)
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();

		//Class Query Encoding/Merging
		$match1Encoded=json_encode($idMatch1);
		$match2Encoded=json_encode($idMatch2);
		$match3Encoded=json_encode($idMatch3);
		$Merge1and2 = json_encode(array_merge(json_decode($match1Encoded, true),json_decode($match2Encoded, true)));
		$ClassesToSurvey = array_merge(json_decode($Merge1and2, true),json_decode($match3Encoded, true));

		//Possible Question Query [code, text, domain ID]
		$questionIDs = [];
		forEach($ClassesToSurvey as $result) {
			$domainID=$result['Domain_ID'];
			if(in_array($domainID, $questionIDs)) {

			} else {
				array_push($questionIDs, $domainID);
			}
		}

		//
		$questions = [];
		forEach($questionIDs as $checkID) {
			$questionsForID = DB::table('Questions')
						->select('Questions.Domain_ID', 'Questions.Question_ID', 'Questions.Text')
						->where('Questions.Active', 1)
						->where('Domain_ID', $checkID)
						->get();
			$questionsEncoded = json_encode($questionsForID);
			$questions = array_merge(json_decode(json_encode($questions), true),json_decode($questionsEncoded, true));
		}

		$teacherName = DB::table('Teachers')
						->select('Teachers.Name')
						->where('Teacher_ID', $id)
						->get()[0]->Name;
		
		
		
		//dd($ClassesToSurvey);
		//dd($questions);

		$data=array('id'=>$id,
					'ClassesToSurvey'=>$ClassesToSurvey,
					'questions'=>$questions,
					'teacherName'=>$teacherName);
		return view('actualSurvey')->with($data);
	}
}
