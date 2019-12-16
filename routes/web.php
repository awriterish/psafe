<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/testPage', function () {
    return view('testPage');
});

Route::get('/survey', 'SurveyController@survey');

Route::get('/teacher/{id}', 'SurveyController@setTeacherID');

Route::post('survey', 'SurveyController@submit');

Route::get('/dataLoader', function(){
  return view("dataLoader");
});

Route::get('/testLogin', function(){
  return view("testLogin");
});

Route::get('/testing', function(){
  return view("testing");
});

Route::get('/teacherLayout', function(){
  return view("teacherLayout");
});

Route::get('/editQuestions', "FetchData@editQuestions");

Route::get('/actualSurvey', function(){
  return view("actualSurvey");
});

Route::get('/viewReport', function(){
  return view("viewReport");
});

Route::get('/editDomains',"FetchData@activeDomains"
);

Route::get('/teacherHelp', function(){
  return view("teacherHelp");
});

Route::get('/graph', "FetchData@domains");

Route::get('/graph/{id}', "FetchData@graph");

Route::get('/loadData',"FetchData@load");

Route::get('/updateDomains',"dataUpdater@updateDomains");

Route::get('/generateReport', 'ReportGenerator@generateRecent');

Route::get('/generateReport/{span}','ReportGenerator@generateReport');

Route::get('/updateDatabase', function(){
  return view("updateDatabase");
});
