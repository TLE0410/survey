<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\User;
use App\Survey;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function path() {
    	return url('/questionnaire/'.$this->id);
    }
    public function publicPath() {
    	return url('/survey/'.$this->id.'-'.Str::slug($this->title));
    }
    public function user() {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function questions() {
    	return $this->hasMany(Question::class, 'questionnaire_id', 'id');
    }
    public function surveys() {
    	return $this->hasMany(Survey::class, 'questionnaire_id', 'id');
    }

}
