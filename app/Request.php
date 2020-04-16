<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function course(){
       return $this->belongsTo('App\Course');
    }

    public function instructor(){
       return $this->belongsTo('App\Instructor');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }
}
