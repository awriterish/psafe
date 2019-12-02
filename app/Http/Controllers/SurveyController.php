<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function survey($id) {
		$classes = DB::table('Class')
						->select('Class.Name as ClassName', 'Class.Class_ID', 'Class.Domain_ID as ClassDomainID',
								'Learning Domains.Name as DomainName', 'Learning Domains.Domain_ID')
						->join('Learning Domains', 'Class.Domain_ID', '=', 'Learning Domains.Domain_ID')
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();
		$classesArray = json_decode(json_encode($classes), True);
		$data=array('id'=>$id,
					'classes'=>$classes,
					'classesArray'=>$classesArray);
		foreach ($classes as $user) {
			print_r($user);
		}
		dd($classes);
		return view('survey')->with($data);
	}
}
