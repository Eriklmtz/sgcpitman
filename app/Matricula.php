<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $primaryKey = "matricula";

    public function alumno(){
    	return $this->belongsTo("App\Alumno");
    }


    public function especialidade(){
    	return $this->belongsTo("App\Especialidade");
    }

    public function pagos(){
        return $this->hasMany("App\Pago","matricula","matricula");
        // hasMany("Pago es el modelo a relacionar ","clave foranea en el modelo Pago","clave primaria en el modelo Matricula");
    }
}
