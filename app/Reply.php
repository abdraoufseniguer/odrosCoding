<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function student(){
        return $this->belongsTo('App\Student');
    }
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
