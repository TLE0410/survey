<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Questionnaire;
use App\SurveyResponses;
class Survey extends Model
{
	protected $guarded = [];
    public function surveyResponses() {
    	return $this->hasMany(SurveyResponses::class, 'survey_id', 'id');
    }
    public function Questionnaire() {
    	return $this->belongsTo(Questionnaire::class, 'questionnaire_id', 'id');
    }
}
