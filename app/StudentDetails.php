<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentDetails extends Model
{
     protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function classes(){
        return $this->hasOne('App\ClassType','id','class_id');
    }
    public function sessions(){
        return $this->hasOne('App\SessionDate','id','session_id');
    }
    public function sections(){
        return $this->hasOne('App\Section','id','section_id');
    }
    public function studentAttendance(){
        return $this->hasOne('App\StudentAttendance','student_id','id');
    }
    public function centers(){
        return $this->hasOne('App\Center','id','center_id');
    }
}
