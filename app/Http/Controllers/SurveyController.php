<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class SurveyController extends Controller
{
    function show(Questionnaire $questionnaire, $slug) {
    	return view('survey.show', compact('questionnaire', 'slug'));
    }
    function store (Questionnaire $questionnaire) {
    	$data = request()->validate([
    		'responses.*.answer_id' 	=>	'required',
    		'responses.*.question_id'	=>	'required', 
    		'Survey.name'				=>	'required',
    		'Survey.email'				=>	'required|email'
    	]);
    	$survey = $questionnaire->surveys()->create($data['Survey']);
    	$survey->surveyResponses()->createMany($data['responses']);
    	return 'Thank you';
    }
}
