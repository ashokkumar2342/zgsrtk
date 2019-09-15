<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
     protected $fillable = [
        'applied', 'other', 'name', 'dob','mobile','email','address','city','workexperience',
    ];
}
