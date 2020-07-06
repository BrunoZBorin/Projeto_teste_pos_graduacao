<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/areas', 'AreaController@index')->name('areas.index');
//Route::get('/areas/create', 'AreaController@create');
//Route::post('/areas/store', 'AreaController@store')->name('areas.store');
//Route::put('/areas/update', 'AreaController@update')->name('areas.update');
Route::get('/study/list', 'StudyController@showStatus')->name('studies.list');
Route::resource('areas', 'AreaController')->except('show');
Route::resource('studies', 'StudyController')->except('show');