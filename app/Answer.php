<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function question() {
    	return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function responses() {
    	return $this->hasMany(SurveyResponses::class, 'answer_id', 'id');
    }
}
