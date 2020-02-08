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
}
