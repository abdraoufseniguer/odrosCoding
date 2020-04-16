<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $guarded = [];

    // relation with video content
    public function cours_content_videos (){
        return $this->hasMany("App\cours_content_video");
    }

    // relation with terms
    public function terms (){
        return $this->hasMany("App\Term");
    }

    // relation with photos content
    public function cours_content_photos (){
        return $this->hasMany("App\Cours_content_photos");
    }

    // relation with files content
    public function cours_content_files (){
        return $this->hasMany("App\cours_content_file");
    }

    // relation with reservations
    public function reservations (){
        return $this->hasMany("App\Reservation");
    }

    // relation with requests
    public function requests (){
        return $this->hasMany("App\Request");
    }

    // relation with requirements
    public function requirments (){
        return $this->hasMany("App\RequirmentsCr");
    }

    // relation with assingment
    public function assignements (){
        return $this->hasMany("App\Assignment");
    }

    // relation with reply
    public function replies (){
        return $this->hasMany("App\Reply");
    }

    // relation with reply
    public function notifications (){
        return $this->hasMany("App\Notification");
    }

    //Relation with the Categories 
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    //Relation with the Instructor
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }

    //Relation with the couse demands
    public function course_creation_demand(){
        return $this->hasOne('App\Course_creation_demande');
    }

    //relation with assignments
    public function assignmentAnswers(){
        return $this->hasMany('App\Assanswer');
    }

    //relation with secstions
    public function sections(){
        return $this->hasMany('App\Coursesection');
    }

     //relation with sections
    //  public function sections(){
    //     return $this->hasMany('App\section');
    // }
    //relation with announcments
    public function announcements(){
        return $this->hasMany('App\announcement');
    }
}
