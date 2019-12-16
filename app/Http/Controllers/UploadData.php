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
      $catalog = Storage::disk("storage")->get("Course Data/data.json");
      $catalog = json_decode($catalog);
      if(count($catalog->value)>0){
        Storage::disk("storage")->delete("Course Data/newData.json");
        Storage::disk("storage")->move("Course Data/data.json", "Course Data/newData.json");
      } else {
        Storage::disk("storage")->delete("Course Data/data.json");
        echo "Invalid data set!";
      }
    }
}
