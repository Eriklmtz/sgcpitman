@extends("layouts.frameCasa")

@section("contenido")
	<?php $x = 1; ?>
	<a href="{{ route("venta.create") }}" class="btn btn-primary">Agregar</a>

	<br /><br />
	{{-- @include("layouts.mens") --}}

	<h1>Lista de Ventas</h1>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
                <th>Alumno</th>
                <th>Fecha de Cobro</th>
                <th>Total</th>
                <th>Observación</th>
                <th>Usuario</th>
			</tr>
		</thead>
		<tbody>

                @foreach($vent as $v)
                <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $v->alumno->nombre.' '.$v->alumno->aPaterno.' '.$v->alumno->aMaterno }}</td>
                    <td>{{ $v->fecha_cobro }}</td>
                    <td>{{ $v->total }}</td>
                    <td>{{ $v->observacion}}</td>
                    <td>{{$v->user->name}}</td>
                    <td>
                        <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acción
                                </button>
                            <div class="dropdown-menu">
                                     <a class="dropdown-item" href="{{ route("venta.show",$v) }}">Detalles</a>
                                    <a class="dropdown-item" href="{{ route('venta.edit',$v) }}">Editar</a>
                                    <form action="{{ route("venta.destroy",$v) }}" method="POST">
                                        {{ csrf_field() }}{!! method_field("DELETE") !!}

                                        <button type="submit" class="dropdown-item">Eliminar</button>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>

                    </td>

                </tr>
                @endforeach

		</tbody>
	</table>
@endsection
