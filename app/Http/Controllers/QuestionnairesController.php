<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;


class QuestionnairesController extends Controller
{
    //
    public function __contruct() {
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
    	return redirect('/questionnaire/'.$questionaire);
    }

    function show(Questionnaire $questionnaire) {
    	return view('questionnaire.show', compact('questionnaire'));
    }
}
