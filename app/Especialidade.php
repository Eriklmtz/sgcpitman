<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{

    public function matriculas(){
    	return $this->hasMany("App\Matricula");///////
    }
}
