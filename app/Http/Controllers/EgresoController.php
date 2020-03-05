<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egreso;
use Exception;
use Session;
use DB;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $fi = empty(request()->fi)?"":request()->fi;
        $ft = empty(request()->ft)?"":request()->ft;
        $tipo = empty(request()->tipo)?"":request()->tipo;
        $egresos = [];
        if(request()->tipo == 2)
            $egresos = Egreso::with("user")->where("fecha",">=",$fi)->where("fecha","<=",$ft)->get();
        else
            $egresos = Egreso::with("user")->where("fecha",">=",$fi)->where("fecha","<=",$ft)->where("estado",$tipo)->get();
        //return $egresos;
        return view("egreso.index",compact("egresos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("egreso.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r){
        try{
            $egr = new Egreso;
            $egr->nombre = $r->name;
            $egr->monto = $r->cantidad;
            $egr->fecha = $r->fecha;
            $egr->descripcion = $r->descripcion;
            $egr->user_id = auth()->user()->id;////////////////
            $egr->estado=1;
            $egr->save();
            Session::flash('msj', ["msj"=>'Egreso Registrado',"clase"=>"success"]);
            return redirect(route("egreso.show",$egr));/////////////////////////////////
        }catch(Exception $e){
            Session::flash('msj', ["msj"=>"Error al realizar la operacion","clase"=>"danger"]);
        }

        return redirect(route("egreso.create"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return redirect(route("egreso.index"));
    // }

     public function show(Egreso $egreso)
    {
        return view("egreso.recibo",compact("egreso"));
    }

    public function showRecibo(Egreso $egreso)/////////////////////////
    {
        //return redirect(route("egreso.recibo",compact("e")));
        return view("egreso.recibo",compact("egreso"));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect(route("egreso.index"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        try{
            $e = Egreso::find($id);
            $e->estado = 1;
            
            $e->save();
            Session::flash('msj', ["msj"=>'Egreso Cobrado',"clase"=>"success"]);
        }catch(Exception $e){
            Session::flash('msj', ["msj"=>"Error al realizar la operacion","clase"=>"danger"]);
        }

        return redirect(route("egreso.index")."?fi=".request()->fi."&ft=".request()->ft."&tipo=".request()->tipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $e = Egreso::findOrFail($id);
            if(auth()->user()->email === "admin"){
                $e->delete();
                Session::flash('msj', ["msj"=>"Egreso eliminado correctamente ","clase"=>"success"]);
                
            }else
                Session::flash('msj', ["msj"=>"No tiene los permisos para realizar la operación","clase"=>"danger"]);    
        }catch(Exception $e){
            Session::flash('msj', ["msj"=>"Error al eliminar el egreso","clase"=>"danger"]);
        }

        return redirect(route("egreso.index")."?fi=".request()->fi."&ft=".request()->ft."&tipo=".request()->tipo);
    }
}
