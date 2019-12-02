<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function survey($id) {
		$data=array('id'=>$id);
		return view('survey')->with($data);
	}
}
