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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tree', 'StaffController@tree');

Route::get('/list', 'StaffController@list');

Route::get('/person/{id}', 'StaffController@getPerson');

Route::post('/getChiefs', 'StaffController@getChiefs');

Route::post('/updatePerson', 'StaffController@updatePerson');

Route::post('/deletePerson', 'StaffController@deletePerson');

Route::post('/cancelUpdatePerson', 'StaffController@cancelUpdatePerson');

Route::post('/uploadImage', 'UploadImageController@uploadImage');

Route::post('/searchBoss', 'StaffController@searchBoss');

Route::post('/getIdByName', 'StaffController@getIdByName');

//Route::post('/getList', 'StaffController@getListStaff');
Route::post('/getList', 'StaffController@getListStaff');

//Route::post('/searchInList', 'StaffController@searchInList');
Route::post('/searchInList', 'StaffController@searchInList');
//Route::get('/searchInList', 'StaffController@searchInList');


Route::post('/insertStaff', 'StaffController@insertStaff');

