<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public $guarded = [];

    //relation with Course
    public function course(){
        return $this->belongsToTo('App\Course');
    }

}
