<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function survey($id) {
		$teachers = DB::select('select * from Teacher where Teacher_ID = 1');
		$data=array('id'=>$id,
					'teachers'=>$teachers);
		dd($teachers);
		return view('survey')->with($data);
	}
}
