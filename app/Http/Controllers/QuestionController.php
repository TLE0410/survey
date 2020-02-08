<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Questionnaire;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function create(Questionnaire $questionnaire) {
    	return view('/question/create', compact('questionnaire'));
    }

    function store(Questionnaire $questionnaire) {

    	$data = request()->validate([
    		'questions.question'	=>	'required',
    		'answers.*.answer'		=>	'required',
    	]);
    	$question = $questionnaire->questions()->create($data['questions']);
    	$question->answers()->createMany($data['answers']);
    	return redirect('/questionnaire/'.$questionnaire->id);
    }

}
 