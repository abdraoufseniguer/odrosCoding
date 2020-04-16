<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirmentsCr extends Model
{
    //Relation with the Instructor
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }
    //Relation with the course
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
