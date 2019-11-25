<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function survey($id) {
	return view('survey', ["id"=>$id]);
	}
}
