<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_creation_demande extends Model
{
    public $guarded = [];

    //relation with instructor
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }

    //relation with course
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
