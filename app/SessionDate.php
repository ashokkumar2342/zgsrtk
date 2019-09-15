<?php

namespace App;

 
use Illuminate\Database\Eloquent\Model;

class SessionDate extends Model
{
	  

    public function centers(){
        return $this->hasOne('App\Center','id','center_id');
    }
}
