<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;


class QuestionnairesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function create() {
    	return view('questionnaire.create');
    }

    function store() {
    	$data = request()->validate([
    		'title'		=> 'required',
    		'purpose'	=>	'required',
    	]);
    	$data['user_id'] = auth()->user()->id;
    	
    	$questionnaire = auth()->user()->questionnaires()->create($data);
    	return redirect('/questionnaire/'.$questionnaire->id.'/question/create');
    }

    function show(Questionnaire $questionnaire) {
    	
       	return view('questionnaire.show', compact('questionnaire'));
    }
    function destroy(Questionnaire $questionnaire) {
    	foreach ($questionnaire->questions() as $question) {
    		
    		foreach ($question->answers as $answer) {
    			$answer->responses()->delete();
    		}

    		$question->answers()->delete();
    		$question->responses()->delete();
    		$question->delete();
    	}

    	foreach ($questionnaire->surveys as $survey) {
    		$survey->responses()->delete();
    		$survey->delete();
    	}
    	$questionnaire->delete();
    	return redirect('/home');
    }
    
}
