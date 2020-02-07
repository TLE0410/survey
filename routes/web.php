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
Route::get('/questionnaire/create', 'questionnairesController@create');
Route::post('/questionnaire', 'questionnairesController@store');
Route::get('/questionnaire/{questionnaire}', 'questionnairesController@show');

Route::post('/questionnaire/{questionnaire}/question', 'questionController@store');