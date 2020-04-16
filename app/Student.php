<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $guarded = [];
    //relation with user
    public function user(){
        return $this->belongsTo('App\User');
    }
    //relation with reservation
    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

    //relation with assignments
    public function assignmentAnswers(){
        return $this->hasMany('App\Assanswer');
    }

    //relation with requests
    public function Requests(){
        return $this->hasMany('App\Request');
    }
    //relation with replies
    public function replies(){
        return $this->hasMany('App\Reply');
    }
    
    
}
