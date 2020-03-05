<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    // protected $table ="alumnos";
    // protected $primaryKey ="id";

    public function matriculas(){
    	return $this->hasMany("App\Matricula");
    }


}
