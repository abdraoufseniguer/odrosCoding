<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public $guarded = [];
    // relation with courses
    public function courses (){
        return $this->hasMany("App\Course");
    }
    //relation with user
    public function user(){
        return $this->belongsTo('App\user');
    }
    //relation with assignments
    public function assignments(){
        return $this->hasMany('App\Assigment');
    }
    //relation with replies
    public function replies(){
        return $this->hasMany('App\Reply');
    }
     //relation with notifications
     public function notifications(){
        return $this->hasMany('App\Notification');
    }
    
    // relation with requirements
    public function requirments (){
        return $this->hasMany("App\RequirmentsCr");
    }

    //relation with course creation demande
    public function couse_creation_demands(){
        return $this->hasMany('App\Course_creation_demande');
    }

    //relation with assignments
    public function assignmentAnswers(){
        return $this->hasMany('App\Assanswer');
    }
    //relation with announcments
    public function announcements(){
        return $this->hasMany('App\announcement');
    }
}
