@extends("layouts.frameCasa")

@section("contenido")
    <?php $x = 1; ?>
    <div class="col-1 ">
        <a class="dropdown-item d-flex align-items-center" href="{{ route("alumno.create") }}">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fa fa-plus text-white"></i>
              </div>
            </div>

          </a>
    </div>
    {{-- <a href="{{ route("alumno.create") }}" class="btn btn-primary">Agregar</a> --}}


    {{-- @include("layouts.mens") --}}

    <div class="shadow-lg p-3 mb-5 bg-white rounded">
	<h2 align = "center">Lista de Alumnos</h2>
    </div>
	<table class="table table-hover" id="dataTable">
		<thead>
			<tr>
				<th>#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($alumnos as $a)
				<tr>
					<td>{{ $x++ }}</td>
                    <td>{{ $a->nombre.' '.$a->apaterno.' '.$a->amaterno }}</td>
                    <td>{{ $a->telefono }}</td>
                    <td>{{ $a->correo }}</td>
					<td>
						<!-- Example single danger button -->
							<div class="btn-group">
  								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							Acción
  								</button>
							  <div class="dropdown-menu">
								    <a class="dropdown-item" href="{{ route("alumno.show",$a) }}">Mostrar</a>
								    <a class="dropdown-item" href="{{ route('alumno.edit',$a) }}">Editar</a>
								    <form action="{{ route("alumno.destroy",$a) }}" method="POST">
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
