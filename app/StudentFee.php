<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }

    public function discountType(){
        return $this->hasOne('App\DiscountType','id','discount_type_id');
    }
}
