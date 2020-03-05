<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Session;

use App\Pago;
use Illuminate\Http\Request;
use App\Servicio;
use App\Matricula;
use App\Alumno;
use DB;
use Exception;


class PagoController extends Controller
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

    public function index(Request $r){

        try{
            $alumno = Matricula::findOrFail($r->buscar);
        }catch(Exception $e){
            $alumno = [];

        }

        return view("venta.index",compact("alumno"));

    }
    
    public function index2(){

        $fi = empty(request()->fi)?"":request()->fi;
        $ft = empty(request()->ft)?"":request()->ft;
        $tipo = empty(request()->tipo)?"":request()->tipo;
        $pagos=[];
        $pagos = Pago::with("servicios","alumno")->where("fecha_cobro",">=",$fi)->where("fecha_cobro","<=",$ft)->where("tipo",$tipo)->get();
        return view("venta.index2",compact("pagos"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matriculas = Matricula::with("especialidade","alumno")->get();
        //$servicios = Servicio::all();
        //return view("factura.indexCliente",compact("facturas"));
        //return session("carrito");
        return view("venta.create",compact("matriculas","servicios"));
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
            $carrito = session("carrito");

            $lista = [];

            foreach($carrito["tabla"] as $c)
                $lista[] = [
                    "servicio_id"=>$c["id"],
                    "cantidad"=>$c["cantidad"],
                    "precio_unitario"=>$c["precio"],
                    "descuento"=>$c["descuento"],
                    "fecha_pago_servicio"=>$c["fecha"],
                    "descripcion"=>$c["descripcion"]
                ];
                $p = new Pago;
                $p->user_id = auth()->user()->id;
                $p->fecha_cobro = date("d-m-Y");
                $p->matricula = $carrito["alumno"];
                $p->tipo = $carrito["tipo"];

                $p->save();
                $p->servicios()->attach($lista);
                session(["carrito"=>null]);//////////////Hasta aquí finaliza el insertado
                return redirect(route("pago.show",$p));
        }catch(Exception $e){
            Session::flash('msj', ["msj"=>"Error al realizar la operacion","clase"=>"danger"]);
            return redirect(route("pago.create"));
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        return view("venta.show",compact("pago"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //$pago->servicios()->detach();
        $pago->status = 0;////////////////////////////////////////////////////////////
        $pago->save();
        if(request()->r == "alumno")
            return redirect(route("pago.index")."?buscar=".request()->buscar);

        return redirect(route("pago.index2")."?fi=".request()->fi."&ft=".request()->ft);
    }


    public function tablaVirtual(Request $r){

        if(empty(session("carrito")))
            session( ["carrito" => ["alumno"=>$r->alumno,"tipo"=>$r->tipo,"tabla"=>[] ]] );///////////////////tipop  a   tipo
        $carrito = session("carrito");
        $carrito["tipo"] = $r->tipo;/////////////////////////////////tipop  a   tipo
        if(array_key_exists($r->id, $carrito["tabla"])){
            $carrito["tabla"][$r->id]["cantidad"] +=  $r->cantidad;
            $carrito["tabla"][$r->id]["descuento"] = $r->descuento;
        }else
            $carrito["tabla"][$r->id] = ["id"=>$r->id,"cantidad"=>$r->cantidad,"concepto"=>$r->concepto,"precio"=>$r->precio,"descripcion"=>$r->descripcion,"fecha"=>$r->fecha,"descuento" => $r->descuento];

        session(["carrito"=>$carrito]);
        return $this->mostrar_tabla();

    }

    public function mostrar_tabla(){
        $carrito = session("carrito");
        return view("venta.tablaVirtual",compact("carrito"));
    }

    public function eliminaServCarrito($id){
        $carrito = session("carrito");
        //dd($carrito);
        unset($carrito["tabla"][$id]); //UNSET se usa Para destruir elementos en PHP
        if(count($carrito["tabla"]) == 0)
            $carrito = [];
        session(["carrito"=>$carrito]);
        return $this->mostrar_tabla();
    }

    public function cancelarCarrito(){
        session(["carrito"=>[]]);
        return $this->mostrar_tabla();
    }


}
