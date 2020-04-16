<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // relation with courses
    public function courses (){
        return $this->hasMany("App\Course");
    }
}
