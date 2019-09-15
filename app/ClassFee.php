<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ClassFee extends Model
{
    use SoftDeletes;
    public function classes(){
    	return $this->hasOne('App\ClassType','id','class_id');
    }
    public function sessions(){
    	return $this->hasOne('App\SessionDate','id','session_id');
    }
    public function centers(){
    	return $this->hasOne('App\Center','id','center_id');
    }
    protected $fillable = [
        'center_id', 'class_id', 'section_id', 
    ];
}
