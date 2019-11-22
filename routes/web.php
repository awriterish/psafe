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

Route::get('/test', function () {
    return view('pageTester');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/test', function () {
    return view('pageTester');
});

Route::get('/survey', function () {
    return view('survey');
});
