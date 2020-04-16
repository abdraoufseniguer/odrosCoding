<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $guarded = [];

    // relation with instructor
    public function instructor(){
        return $this->hasOne("App\Instructor");
    }
 
    // relation with student
    public function student(){
        return $this->hasOne('App\Student');
    }
}
