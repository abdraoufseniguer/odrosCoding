<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours_content_photos extends Model
{
    public $guarded = [];
    //Relation with the cours 
    public function course(){
        return $this->belongsTo('App\Course');
    }
    //Relation with the lecture
    public function lecture(){
        return $this->belongsTo('App\Lecture');
    }
}
