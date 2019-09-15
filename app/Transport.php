<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transport extends Model
{
    use SoftDeletes;
    public function center(){
    	return $this->hasOne('App\Center','id','center_id');
    }
    public function route(){
    	return $this->hasOne('App\TransportRoute','id','route_id');
    }
}
