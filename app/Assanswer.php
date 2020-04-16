<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assanswer extends Model
{
    //Relation with the Instructor
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }
    //Relation with Courses
    public function course(){
        return $this->belongsTo('App\Course');
    }

    //Relation with Student
    
    public function student(){
        return $this->belongsTo('App\Student');
    }

    //Relation with Student

    public function assignment(){
        return $this->belongsTo('App\Assignment');
    }


}
