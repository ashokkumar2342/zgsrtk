<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
}
