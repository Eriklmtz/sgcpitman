<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function ventas(){
    	return $this->belongsToMany(Venta::class,"servicio_ventas")->withPivot("especialidade_id","cantidad","precio_unitario","total","descuento","observacion","fecha_pago");
    }

    public function especialidad(){
    	return $this->belongsTo("App\Especialidade","especialidad_id");
    }
}
