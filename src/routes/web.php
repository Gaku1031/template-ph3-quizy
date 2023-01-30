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

// Route::get('/', function () {
//     return view('user/index');
// });
Route::get('/', 'user\StudyController@index');

Route::get('/user/study/record', 'user\StudyController@add');
Route::post('/user/study/record', 'user\StudyController@create')->name('study_record');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

