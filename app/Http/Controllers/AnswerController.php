<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    
    function update(Answer $answer) {

        $data = request()->validate([
            'answers.*.answer'    =>  'required'
        ]);
        
        $answer->updateExistingPivot($data['answers']);
        
        return;
    }
}
