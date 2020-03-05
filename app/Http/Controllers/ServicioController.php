<?php

namespace App\Http\Controllers;

use App\Servicio;
use App\Matricula;
use App\Especialidade;
use Illuminate\Http\Request;
use DB;
use Exception;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($e = "")
    {
        $servicios = Servicio::with("especialidad")->orderBy("especialidad_id","ASC")->get();
        $titulo = "Servicios";
        return view("servicio.index",compact("servicios","titulo","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidade::all();
        return view("servicio.create",compact("especialidades"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        try{
            $s = new Servicio;
            $s->concepto = $r->input("concepto");
            $s->precio = $r->input("precio");
            $s->descripcion = $r->input("descripcion");
            $s->especialidad_id = $r->especialidad;
            $s->save();
            $e = "ok-create";
        }catch(Exception $e){
            $e = "error-create";
        }

        return $this->index($e);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)// ????????????????????????????????????
    {
        $e = "";
        try{
            $serv = $servicio;
        }catch(Exception $e){
            $serv = null;
            $e = "error-show";
        }
        return view("servicio.show",compact("serv","e"));
    }

    // public function show($id)
    // {
    //     $e = "";
    //     try{
    //         $serv = Servicio::findOrFail($id);
    //     }catch(Exception $e){
    //         $serv = null;
    //         $e = "error-show";
    //     }
    //     return view("servicio.show",compact("serv","e"));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        $e = "";
        try{
            //$cat = Categoria::findOrFail($id);
            $serv = $servicio;
        }catch(Exception $e){
            $serv = null;
            $e = "error-show";
        }
        $especialidades = Especialidade::all();
        return view("servicio.edit",compact("serv","e","especialidades"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Servicio $servicio)
    {
        try{
            $serv = $servicio;
            $serv->concepto = $r->input("concepto");
            $serv->precio = $r->input("precio");
            $serv->descripcion= $r->input("descripcion");
            $serv->especialidad_id = $r->especialidad;
            $serv->save();
            $e = "ok-update";
        }catch(Exception $e){
            $serv = null;
            $e = "error-update";
        }
        return $this->index($e);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        try{
            $servicio->delete();
            $e = "ok-delete";
        }catch(Exception $e){
            $e = "error-delete";
        }

        return $this->index($e);
    }

    public function serviciosAjax(Request $r){

        $buscar = trim($r->input("servicio"));
        echo "$buscar";
        $sql="SELECT servicios.* FROM servicios where (concepto LIKE '%$buscar%' )";

        $servicios= DB::select($sql);

       //print_r($servicios);

        return view("venta.matricula",compact("servicios"));
    }

    public function servicioEspecialidad(Request $r){
        $servicios = [];
        if($r->tipo == "alumno"){
            $alumno = Matricula::findOrFail($r->alumno);

            $servicios = Servicio::where("especialidad_id",$alumno->especialidade_id)->orderBy("concepto","ASC")->get();
            //return $servicios;
        }

        if($r->tipo == "costo"){
            $servicio = Servicio::findOrFail($r->id);
            return $servicio;
        }
        //return $r;

        return view("servicio.ajax",compact("servicios"));
    }



    // public function productosAjax(Request $r){
    //     $buscar = trim($r->input("buscar"));

    //     $sql="SELECT producto.*,categoria.nomCat FROM categoria,producto
    //     WHERE categoria = idCat AND (nomProd LIKE '%$buscar%' OR nomCat
    //     LIKE '%$buscar%')";
    //     $productos = DB::select($sql);

    //     //$productos = Producto::where("nomProd","LIKE","%$buscar%")->get();
    //     //return $productos;
    //     return view("compras.productos",compact("productos"));
    // }
}
