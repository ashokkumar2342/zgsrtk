<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
     public function sessions(){
    	return $this->hasOne('App\SessionDate','id','session_id');
    }
}
