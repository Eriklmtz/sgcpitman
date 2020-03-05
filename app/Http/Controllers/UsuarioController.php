<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view("usuario.index",compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuario.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r){
        $this->valida($r);
        try{
            $us = new User;
            $us->name = $r->name;
            $us->email = $r->email;
            $us->password = Hash::make($r->password);
            $us->tipo = $r->tipo;
            $us->save();
            Session::flash('msj', ["msj"=>'Usuario registrado',"clase"=>"success"]);
        }catch(Exception $e){
            Session::flash('msj', ["msj"=>"Error al realizar la operacion","clase"=>"danger"]);
        }

        return redirect(route("usuario.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return redirect(route("usuario.index"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $u = User::find($id);
        return view("usuario.edit",compact("u"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id){
        try{
            $us = User::findOrFail($id);
            $us->name = $r->name;
            $us->email = $r->email;
            $us->tipo = $r->tipo;
            $us->save();
            Session::flash('msj', ["msj"=>"Usuario $r->name editado correctamente ","clase"=>"success"]);
        }catch(Exception $e){
            Session::flash('msj', ["msj"=>"Error al realizar la operacion","clase"=>"danger"]);
        }

        return redirect(route("usuario.index"));
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
            $us = User::findOrFail($id);
            if($us->email != "admin"){
                
                Session::flash('msj', ["msj"=>"Usuario $us->name eliminado correctamente ","clase"=>"success"]);
                $us->delete();
            }else
                Session::flash('msj', ["msj"=>"El usuario admin no se puede eliminar","clase"=>"danger"]);    
        }catch(Exception $e){
            Session::flash('msj', ["msj"=>"Error al realizar la operacion","clase"=>"danger"]);
        }

        return redirect(route("usuario.index"));
    }

    private function valida(Request $r){
        $regex = '/^[A-Za-z áéíóúÁÉÍÓÚÑñ]*$/';
        $m = [
            "name.required"=>"Nombre Requerido",
            "name.regex"=>"El nombre tiene que contener letras",
            "password.required"=>"Contraseña Requerida",
            "password.confirmed"=>"Las contraseñas no son iguales",
            "password.min"=>"Se requiere minimo 6 caracteres",
            "email.unique" => "Utilizar otro nombre de usuario",
            "email.required" => "Usuario requerido",
        ];

        $v =  [
            "name"=>"required|regex:$regex",
            "email" =>"required|unique:users,email",
            "password" => "required|min:6|confirmed"
        ];

        $validate = $r->validate($v,$m);;
    }
}
