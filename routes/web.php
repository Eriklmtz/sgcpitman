<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/registrarventa', function () {
    return view('detalleVenta.index');
});

Route::get('login2', function () {
    return view('login2');
});

Auth::routes();
Route::resource("servicio","ServicioController");
Route::resource("alumno","AlumnoController");
Route::resource("home","AlumnoController");
Route::resource("crearalumno","AlumnoController");
Route::resource("venta","VentaController");
Route::resource("especialidad","especialidadeController");
Route::resource("matricula","matriculaController");
Route::resource("egreso","egresoController");
//Route::get('/home', 'HomeController@index')->name('home');

Route::post("buscar/alumnos","AlumnoController@alumnosAjax")->name("alumnos.alumnosAjax");

Route::resource("pago","PagoController");

Route::get("procesa-pago","PagoController@store")->name("pago.procesa");
Route::get("pago-por-fechas","PagoController@index2")->name("pago.index2");

Route::get("egreso-recibo","EgresoController@showRecibo")->name("egreso.recibo");



Route::group(['prefix'=>'ajax'],function(){
    // Route::post("compras/productos","FacturaController@productosAjax")->name("compras.productosAjax");
    // Route::post("compras/carrito","ComprasController@carrito");
    Route::post("buscar/matricula","PagoController@matriculasAjax")->name("pagos.matriculasAjax");
    Route::post("buscar/servicio","ServicioController@serviciosAjax")->name("servicios.serviciosAjax");
    Route::post("get-servicios","ServicioController@servicioEspecialidad")->name("servicio.ajax");
    Route::post("agregar-servicio/carrito","PagoController@tablaVirtual")->name("pago.agregar-servicio");
    Route::get("listar/carrito","PagoController@mostrar_tabla")->name("pago.mostrar-tabla");
    Route::get("eliminar/servicio/{id}/carrito","PagoController@eliminaServCarrito")->name("pago.eliminar-servicio");
    Route::get("cancelar/servicio/carrito","PagoController@cancelarCarrito")->name("pago.cancelar");

});

Route::resource("usuario","UsuarioController");
Route::resource("egreso","EgresoController");

