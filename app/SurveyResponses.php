<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Survey;

class SurveyResponses extends Model
{
	protected $guarded = [];
    public function survey() {
    	return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }
    public function question() {
    	return $this->belongsTo(Question::class, 'question_id', 'id');
    }
    public function answer() {
    	return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }
}
