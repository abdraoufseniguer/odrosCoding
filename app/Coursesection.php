<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursesection extends Model
{
    public function course(){
        return $this->belongsTo('App\Course');
    }
    public function lectures(){
        return $this->hasMany('App\Lecture');
    }
}
