<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    public function classFee(){
        return $this->hasOne('App\ClassFee','class_id','class_id')->where('session_id',$this->session_id);;
    }
    public function paymentType(){
        return $this->hasOne('App\PaymentType','id','payment_type_id');
    }
    public function discountType(){
        return $this->hasOne('App\DiscountType','id','discount_type_id');
    }
    public function sessions(){
        return $this->hasOne('App\SessionDate','id','session_id');
    }
    public function sections(){
        return $this->hasOne('App\Section','id','section_id');
    }
    public function centers(){
        return $this->hasOne('App\Center','id','center_id');
    }
    public function studentAttendance(){
        return $this->hasOne('App\StudentAttendance','student_id','id');
    }
    public function studentFee(){
        return $this->hasMany('App\StudentFee','student_id','id');
    }
    
}
