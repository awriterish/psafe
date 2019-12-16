<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadData extends Controller
{
    public function data(Request $request){
      $file = $request->file('file');
      dd($request);
      if($file->getClientOriginalExtension() == '.json'){
        $file->move("storage/Course Data/data.json");
      }
    }
}
