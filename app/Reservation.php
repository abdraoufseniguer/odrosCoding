<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     //Relation with the courses 
     public function course(){
        return $this->belongsTo('App\Course');
    }
    //Relation with the courses 
    public function student(){
        return $this->belongsTo('App\Student');
    }
}
