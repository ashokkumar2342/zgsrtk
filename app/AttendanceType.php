<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceType extends Model
{
    protected $fillable = ['student_id'];

    public function StudentAttendence(){
        return $this->hasOne(StudentAttendence::class);
    }
}
