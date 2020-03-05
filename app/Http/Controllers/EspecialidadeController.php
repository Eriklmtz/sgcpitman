<?php

namespace App\Http\Controllers;
use\DB;
use App\Especialidade;
use Illuminate\Http\Request;
use Exception;



class EspecialidadeController extends Controller
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
    public function index($e= "")
    {
        $especialidades = Especialidade::all();
        $titulo = "Especialidades";
        return view("especialidad.index",compact("especialidades","titulo","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("especialidad.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $s = new Especialidade;

            $s->nombre = $r->input("nombre");
            $s->descripcion= $r->input("descripcion");
            $s->status = $r->input("status");

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
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidade $especialidade)
    {
        $e = "";
        try{
            $esp = $especialidade;
        }catch(Exception $e){
            $esp = null;
            $e = "error-show";
        }
        return view("especialidad.show",compact("esp","e"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e = "";
        try{

            $esp = Especialidade::findorFail($id);
            //print_r($esp);
        }catch(Exception $e){
            $esp = null;
            $e = "error-edit";
        }
        return view("especialidad.edit",compact("esp","e"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        try{
            $esp = Especialidade::findorFail($id);
            $esp->nombre = $r->input("nombre");
            $esp->escuela = $r->input("escuela");
            $esp->status= $r->input("status");

            $esp->save();
            $e = "ok-update";
        }catch(Exception $e){
            $esp = null;
            $e = "error-update";
        }
        return $this->index($e);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $esp = Especialidade::findOrFail($id);
            $esp->delete();
            $msj = "Registro eliminado correctamente";
        }catch(Exception $e){
            $msj = "..:: No se puede eliminar la especialidad ".'<<'.$esp->nombre.'>>'." debido a que está relacionada ::..";
        }

        //return $this->index($e);
        return back()->with(compact('msj'));///////////////
    }
}
