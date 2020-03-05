<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    function user(){
    	return $this->belongsTo("App\User");
    }
}
