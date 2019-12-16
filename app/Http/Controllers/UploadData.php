<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadData extends Controller
{
    public function index(){
      return view('uploadData');
    }

    public function data(Request $request){
      $file = $request->file('file');
      $location = $file->store("","storage");
      Storage::disk("storage")->move($location, "Course Data/data.json");
    }
}
