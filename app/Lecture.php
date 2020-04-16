<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    // relation with courseSection 
    public function coursesection(){
        return $this->belongsTo("App\Coursesection");
    }
    // relation with video content
    public function cours_content_videos (){
        return $this->hasMany("App\cours_content_video");
    }
     // relation with photos content
     public function cours_content_photos (){
        return $this->hasMany("App\Cours_content_photos");
    }

    // relation with files content
    public function cours_content_files (){
        return $this->hasMany("App\cours_content_file");
    }
}
