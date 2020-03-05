<?php

namespace App\Http\Controllers;
use\DB;
use App\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
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
        $alumnos = Alumno::all();
        $titulo = "Alumnos";
        return view("alumno.index",compact("alumnos","titulo","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("alumno.create");
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
            $s = new Alumno;
            $s->nctrl = $r->input("matricula");
            $s->nombre = $r->input("nombre");
            $s->aPaterno= $r->input("apaterno");
            $s->aMaterno = $r->input("amaterno");
            $s->correo = $r->input("correo");
            $s->telefono = $r->input("telefono");
            $s->direccion = $r->input("direccion");
            $s->status = $r->input("status");
            $s->alergia = $r->input("alergia");
            $s->num_emergencia = $r->input("tel-emergencia");

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
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        $e = "";
        try{
            $alum = $alumno;
        }catch(Exception $e){
            $alum = null;
            $e = "error-show";
        }
        return view("alumno.show",compact("alum","e"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        $e = "";
        try{
            $alum = $alumno;
        }catch(Exception $e){
            $alum = null;
            $e = "error-edit";
        }
        return view("alumno.edit",compact("alum","e"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Alumno $alumno)
    {
        try{
            $alum = $alumno;
            $alum->nombre = $r->input("nombre");
            $alum->aPaterno= $r->input("apaterno");
            $alum->aMaterno = $r->input("amaterno");
            $alum->correo = $r->input("correo");
            $alum->telefono = $r->input("telefono");
            $alum->direccion = $r->input("direccion");
            $alum->alergia = $r->input("alergia");
            $alum->tel_emergencia = $r->input("tel-emergencia");
            $alum->save();
            $e = "ok-update";
        }catch(Exception $e){
            $alum = null;
            $e = "error-update";
        }
        return $this->index($e);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        // try{
        //     $a= $alumno;
        //     $a->delete();
        //     $e = "ok-delete";
        // }catch(Exception $e){
        //     $a= null;
        //     $e = "error-delete";
        // }
        try{
            $alumno->delete();
            $e = "ok-delete";
        }catch(Exception $e){
            $e = "error-delete";
        }

        return $this->index($e);
    }


    public function alumnosAjax(Request $r){
        $buscar = trim($r->input("buscar"));

        $sql="SELECT alumnos.* FROM alumnos
        WHERE (nombre LIKE '%$buscar%')";
        $alumnos = DB::select($sql);

        //$alumnos = alumno::where("nomProd","LIKE","%$buscar%")->get();
        //return $alumnos;
        return view("alumno.index",compact("alumnos"));
    }



}
