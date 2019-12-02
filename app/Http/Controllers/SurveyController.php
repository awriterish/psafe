<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
	function addToOutJSON(&$out, $toAdd) {
		foreach ($toAdd as $content) {
			array_push($out,$content);
		}
	}
	
    public function survey($id) {
		$outJSON = json_encode (json_decode ("{}"));
		
		$classes = DB::table('Class')
						->select('Class.Name as ClassName', 'Class.Class_ID',
								'Learning Domains.Name as DomainName', 'Learning Domains.Domain_ID')
						->join('Learning Domains', 'Class.Domain_ID', '=', 'Learning Domains.Domain_ID')
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();
		
		
		$classes2 = DB::table('Class')
						->select('Class.Name as ClassName', 'Class.Class_ID',
								'Learning Domains.Name as DomainName', 'Learning Domains.Domain_ID')
						->join('Learning Domains', 'Class.Domain_ID2', '=', 'Learning Domains.Domain_ID')
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();
		
		addToOutJSON($outJSON, $classes);
		
		$classesJSON=json_encode($classes);
		$classes2JSON=json_encode($classes2);
		foreach ($classes as $user) {
			print($user->ClassName);
		}	
		
		dd($outJSON);

		$data=array('id'=>$id,
					'classes'=>$classes);
		return view('survey')->with($data);
	}
}
