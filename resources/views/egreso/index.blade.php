@extends("layouts.frameCasa")

@section("contenido")
<div class="col-1 ">
        <a class="dropdown-item d-flex align-items-center" href="{{ route("egreso.create") }}">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fa fa-plus text-white"></i>
              </div>
            </div>

          </a>
    </div>
	@if(Session::has('msj'))
		<br />
		<div class="alert alert-{{ Session::get("msj")["clase"] }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{Session::get('msj')["msj"]}}</strong>
		</div>
		
		<br />
	@endif
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{ route('egreso.index') }}"  role="form" >
        <legend>Consultar Egresos</legend>
            <div class="input-group">
              <input type="date" class="form-control bg-light border-0 small" name="fi" placeholder="Fecha de Inicio" aria-label="Buscar" aria-describedby="basic-addon2" id="fi" autofocus="" value="{{ empty(request()->fi)?date("Y-m-d"):request()->fi }}" onblur="$('#ft').val($('#fi').val());" required>
              - 
              <input type="date" class="form-control bg-light border-0 small" name="ft" placeholder="Fecha de Fin" aria-label="Buscar" aria-describedby="basic-addon2" id="ft" autofocus="" value="{{ request()->ft }}" required>

              <select class="form-control bg-light border-0 small" name="tipo" id="tipo">
                <option value="2">Todos</option>
                <option value="0">Pendiente</option>
                <option value="1">Pagado</option>
              </select>
              <div class="input-group-append">
                &nbsp;&nbsp;
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


    <?php 
        $x = 1;
        $totalPendiente=0;
    	$totalCobrado = 0;
     ?>
    
    <br />
        @if (count($egresos) >0 )
        
            <br />
            <h4 align="center">Reporte de Egresos 
                @if (request()->tipo == 0)
                    Pendientes
                @elseif(request()->tipo == 1)
                    Pagados
                @endif
                
                @if (request()->fi === request()->ft)
                    {{ "de la fecha ".request()->fi }}
                @else
                    {{ " a partir de las fechas ".request()->fi." al ".request()->ft }}
                @endif

            </h4>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Deudor</th>
                        <th>Descripcion</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($egresos as $e)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>{{ $e->fecha}}</td>
                            <td>{{ $e->nombre }}</td>
                            <td>{{ $e->descripcion }}</td>
                            <td>${{ $e->monto }}</td>
                            <td>
                                @if($e->estado == 0)
                                   <p style="background: aquamarine">Pendiente</p> 
                                @else
                                    Pagado     
                                @endif
                            </td>
                            <td>{{ $e->user->name }}</td>
                            @php
                                if($e->estado == 0)
                                    $totalPendiente += $e->monto;
                                else
                            	    $totalCobrado += $e->monto;
                            @endphp
                            {{-- checar la condicion siguiente y hacerla mas general! --}}
                            <td> 
                            	@if (auth()->user()->email === "admin"||auth()->user()->email === "erik")
                                    @if ($e->estado == 0)
                                        <form action="{{ route("egreso.update",$e->id)."?fi=".request()->fi."&ft=".request()->ft."&tipo=".request()->tipo }}" method="POST" onsubmit="return confirm('¡El egreso se cambiara a pagado! ¿Desea continuar?')">
                                        {{ csrf_field() }}{!! method_field("PUT") !!}
                                        <button type="submit" class="btn btn-success">Cobrar</button>
                                    </form>    
                                    @endif
                                    
                                    @if (auth()->user()->email === "admin")
                                        <form action="{{ route("egreso.destroy",$e->id)."?fi=".request()->fi."&ft=".request()->ft }}" method="POST" onsubmit="return confirm('¿Desea eliminar el egreso?')">
                                            {{ csrf_field() }}{!! method_field("DELETE") !!}
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    @endif
								@endif

                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td align="right" colspan="6"><b>Total pendiente:</b> $ {{ $totalPendiente }}</td>
                    	<td align="right" colspan="5"><b>Total cobrado:</b> $ {{ $totalCobrado }}</td>
                    </tr>
                </tbody>
            </table>
        
        @endif
        
@endsection
@section("script")
    <script>
            $(document).ready(function() {
                var t = "{{ request()->tipo }}";
                if(t.length > 0){
                    $("#tipo").val(t);    
                    
                }
            });
            
        </script>
@endsection