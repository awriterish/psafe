<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
	
    public function survey($id) {
		$rowNum=0;
		$outJSON = json_encode(json_decode ("{}"));
		
		$idMatch1 = DB::table('Class')
						->select('Class.Name as ClassName', 'Class.Class_ID',
								'Learning Domains.Name as DomainName', 'Learning Domains.Domain_ID')
						->join('Learning Domains', 'Class.Domain_ID', '=', 'Learning Domains.Domain_ID')
						->where('Learning Domains.Active', 1)
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();

		$idMatch2 = DB::table('Class')
						->select('Class.Name as ClassName', 'Class.Class_ID',
								'Learning Domains.Name as DomainName', 'Learning Domains.Domain_ID')
						->join('Learning Domains', 'Class.Domain_ID2', '=', 'Learning Domains.Domain_ID')
						->where('Learning Domains.Active', 1)
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();
		
		$idMatch3 = DB::table('Class')
						->select('Class.Name as ClassName', 'Class.Class_ID',
								'Learning Domains.Name as DomainName', 'Learning Domains.Domain_ID')
						->join('Learning Domains', 'Class.Domain_ID3', '=', 'Learning Domains.Domain_ID')
						->where('Learning Domains.Active', 1)
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();
		
		$match1Encoded=json_encode($idMatch1);
		$match2Encoded=json_encode($idMatch2);
		$match3Encoded=json_encode($idMatch3);
		
		print_r($match1Encoded);
		print_r($match2Encoded);
		print_r($match3Encoded);
		
		$Merge1and2 = json_encode(array_merge(json_decode($match1Encoded, true),json_decode($match2Encoded, true)));
		$ClassesToSurvey = json_encode(array_merge(json_decode($Merge1and2, true),json_decode($match3Encoded, true)));

		dd($ClassesToSurvey);

		$data=array('id'=>$id,
					'ClassesToSurvey'=>$ClassesToSurvey);
		return view('survey')->with($data);
	}
}
