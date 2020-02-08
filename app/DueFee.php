<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DueFee extends Model
{
     protected $fillable = [
         'student_id', 'student_fee_id', 'due_fee',
     ];

}
