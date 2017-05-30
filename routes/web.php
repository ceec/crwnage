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


Route::get('/','DisplayController@index');

Route::get('/members','DisplayController@members');


Route::get('/character/{name}','DisplayController@character');
Auth::routes();

Route::get('/home', 'HomeController@index');


//data gathering

Route::get('/data/news','DataController@news');
Route::get('/data/members','DataController@members');