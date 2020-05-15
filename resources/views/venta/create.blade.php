@extends("layouts.frameCasa")
@section("contenido")
@php
    //session(["carrito"=>[]]);
@endphp
@php
    if (!empty(session("carrito"))){
        $carrito = session("carrito");
        $al= $carrito["alumno"];
        $tipo = $carrito["tipo"];
        //echo $tipo;
    }else
        $al= "";

@endphp
    @if(Session::has('msj'))
        <div class="alert alert-{{ Session::get("msj")["clase"] }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('msj')["msj"]}}</strong>
        </div>

        <br />
    @endif
	<div class="card ventana-2">
        <div class="card-header">
            <h4>Registro de pagos</h4>
        </div>
        <div class="card-body">
            <form action="" id="cargar-servicio" onsubmit="return cargarServicioTabla('{{ route('pago.agregar-servicio') }}')">
            <div class="row">
                <div class="col-md-4">
                   <div class="form-group{{ $errors->has('alumno') ? ' has-error' : '' }}">
                        <label for="alumno" class="control-label">Alumno:</label>
                        <select name="alumno" id="alumno" required="" data-placeholder=""  class="chosen-select form-control" onchange="serviciosEspecialidad('{{ route("servicio.ajax") }}')">
                            <option value=""></option>
                            @foreach($matriculas as $m)
                                @php
                                    $se = "";
                                    if ($m->matricula == $al)
                                        $se = "selected='selected'";
                                @endphp

                                <option {{ $se }} value="{{ $m->matricula }}">[{{$m->matricula}} - {{ $m->especialidade->nombre }}]{{ $m->alumno->nombre." ".$m->alumno->apaterno." ".$m->alumno->amaterno }}</option>
                            @endforeach
                        </select>


                        @if ($errors->has('alumno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alumno') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('servicio') ? ' has-error' : '' }}">
                        <label for="servicio" class="control-label">Servicio:</label>
                        <select name="servicio" id="servicio" required="" data-placeholder=""  class="chosen-select form-control" onchange="servicioCosto('{{ route("servicio.ajax") }}')">

                        </select>


                        @if ($errors->has('servicio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('servicio') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                        <label for="tipo" class="control-label">Tipo:</label>
                        <select name="tipo" id="tipo" required="" data-placeholder="" class="chosen-select form-control" >
                            <option value=""></option>
                            <option value="efectivo" >Efectivo</option>
                            <option value="deposito" >Deposito</option>

                        </select>

                        


                        @if ($errors->has('tipo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tipo') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('costo') ? ' has-error' : '' }}">
                        <label for="costo" class="control-label">Costo:</label>
                        <input name="costo" id="costo" class="form-control" required="" type="number" step="10" min="0">
                        @if ($errors->has('costo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('costo') }}</strong>
                            </span>
                        @endif
                        <input type="hidden" name="nomc" id="nomc" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                        <label for="cantidad" class="control-label">Cantidad:</label>
                        <input name="cantidad" id="cantidad" required="" class="form-control" type="number" step="1" value="1" min="1">
                        @if ($errors->has('cantidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cantidad') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('descuento') ? ' has-error' : '' }}">
                        <label for="descuento" class="control-label">Descuento:</label>
                        <input name="descuento" id="descuento" class="form-control" type="number" step="1" value="0" min="0">
                        @if ($errors->has('descuento'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descuento') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('fechaps') ? ' has-error' : '' }}">
                        <label for="fechaps" class="control-label">Fecha correspondiente del pago:</label>
                        <div class="">
                            <input id="fechaps" type="date" class="form-control" name="fechaps" value="{{ old('fechaps',date("Y-m-d")) }}" required="">

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                        <label for="nom" class="control-label">Observación:</label>
                        <div class="">
                            <textarea id="descripcion" type="text" class="form-control" name="descripcion">{{ old('descripcion') }}</textarea>

                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="">

                    <button type="submit" class="btn btn-primary">
                        Aceptar
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div id="carrito">


    </div>
@endsection

@section("script")
    <script>
        $(document).ready(function(){
                @if (!empty($carrito))
                    mostrar_tabla_virtual("{{ route('pago.mostrar-tabla') }}");
                    serviciosEspecialidad('{{ route("servicio.ajax") }}');
                    $("#tipo").val("{{ $tipo }}");
                @endif

        });
    </script>
@endsection
