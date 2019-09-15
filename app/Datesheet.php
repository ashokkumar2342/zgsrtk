<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datesheet extends Model
{
    public function classes(){
    	return $this->hasOne('App\ClassType','id','class_id');
    }
    public function sessions(){
    	return $this->hasOne('App\SessionDate','id','session_id');
    }
    public function sections(){
    	return $this->hasOne('App\Section','id','section_id');
    }
}
