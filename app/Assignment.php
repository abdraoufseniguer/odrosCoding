<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //Relation with the Instructor
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }
    //Relation with Courses
    public function course(){
        return $this->belongsTo('App\Course');
    }

    //relation with assignments
    public function assignmentAnswers(){
        return $this->hasMany('App\Assanswer');
    }
}
