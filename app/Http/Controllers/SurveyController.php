<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
	
    public function survey($id) {
		$rowNum=0;
		$outStdClass = json_decode ("{}");
		
		$idMatch1 = DB::table('Class')
						->select('Class.Name as ClassName', 'Class.Class_ID',
								'Learning Domains.Name as DomainName', 'Learning Domains.Domain_ID')
						->join('Learning Domains', 'Class.Domain_ID', '=', 'Learning Domains.Domain_ID')
						->where('Teacher_ID', $id)
						->orWhere('Teacher_ID2', $id)
						->get();
		
		$outJSON = json_encode($idMatch1);
		
		dd($outJSON);

		$data=array('id'=>$id,
					'outJSON'=>$outJSON);
		return view('survey')->with($data);
	}
}
