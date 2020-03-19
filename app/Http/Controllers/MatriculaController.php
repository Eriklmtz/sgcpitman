<?php

namespace App\Http\Controllers;


use App\Matricula;
use App\Alumno;
use App\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Session;
class MatriculaController extends Controller
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
        $matriculas = Matricula::all();
        $titulo = "Matriculas";
        return view("matricula.index",compact("matriculas","titulo","e"));
    }

    //Que se hara?...
    ///mejor te explicopor llamada
    //así hablamos y se edita al mismo tiempo .. ok

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::all();
        $especialidades = Especialidade::all();
        return view("matricula.create",compact("alumnos","especialidades"));
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
            $m = new Matricula;
            $m->matricula = $r->input("matricula");
            $m->alumno_id = $r->input("alumno");
            $m->especialidade_id = $r->input("especialidad");

            // if($r->hasFile('img'))
            //     $m->imagen = $r->file('img')->store("public");

            $m->save();
            Session::flash('msj', ["msj"=>"Alumno matriculado","clase"=>"success"]);
        }catch(QueryException $e){
             Session::flash('msj', ["msj"=>"Matricula duplicada","clase"=>"danger"]);
        }

        return redirect(route("matricula.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        $e = "";
        try{
            $mat = $matricula;
        }catch(Exception $e){
            $mat = null;
            $e = "error-show";
        }
        return view("matricula.show",compact("mat","e"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $e = "";
        try{

            $alumnos = Alumno::all();
            $especialidades = Especialidade::all();
            $mat = $matricula;
            //dd($esp);
        }catch(Exception $e){
            $mat = null;
            $e = "error-edit";
        }
        return view("matricula.edit",compact("mat","alumnos","especialidades","e"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Matricula $matricula)
    {
        try{
            $m = $matricula;
            $m->matricula = $r->input("matricula");
            $m->alumno_id = $r->input("alumno");
            $m->especialidade_id = $r->input("especialidad");

            $m->save();
            $e = "ok-update";
        }catch(Exception $e){
            $m = null;
            $e = "error-update";
        }
        return $this->index($e);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        try{
            $matricula->delete();
            $e = "ok-delete";
        }catch(Exception $e){
            $e = "error-delete";
        }

        return $this->index($e);
    }



}
