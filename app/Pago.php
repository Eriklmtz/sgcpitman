<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pagos";
    protected $primaryKey ="id";

    #Relacion que existe pago y servicio *(Investigar Tabla Pivot en LARAVEL)...
    public function servicios(){
        #withPivote se utiliza para manejar campos extras en las relaciones  M:M
        # [ Modelo relacional,              ]
        return $this->belongsToMany(Servicio::class,
    "pago_servicio")->withPivot("cantidad","precio_unitario","descuento", "fecha_pago_servicio","descripcion");
    }

    public function alumno()
    {
        return $this->belongsTo('App\Matricula',"matricula","matricula");
    }

    public function user(){
     	return $this->belongsTo("App\User");
    }

    // public function alumno(){
    // 	return $this->belongsTo("App\Alumno");
    // }

}
