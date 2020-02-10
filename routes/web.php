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

Route::get('home', 'HomeController@index')->name('home');
Route::get('/questionnaire/create', 'QuestionnairesController@create');
Route::post('/questionnaire', 'QuestionnairesController@store');
Route::get('/questionnaire/{questionnaire}', 'QuestionnairesController@show');
Route::delete('/questionnaire/{questionnaire}', 'QuestionnairesController@destroy');


Route::post('/questionnaire/{questionnaire}/question', 'QuestionController@store');
Route::get('/questionnaire/{questionnaire}/question/create', 'QuestionController@create');
Route::delete('/questionnaire/{questionnaire}/question/{question}', 'QuestionController@destroy');
Route::patch('/question/{question}', 'QuestionController@update');

Route::get('/survey/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/survey/{questionnaire}-{slug}', 'SurveyController@store');




