@extends("layouts.frameCasa")

@section("contenido")
    <?php $x = 1; ?>
    <div class="col-1 ">
        <a class="dropdown-item d-flex align-items-center" href="{{ route("matricula.create") }}">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fa fa-plus text-white"></i>
                </div>
            </div>
            </a>
    </div>


	@if(Session::has('msj'))
        <div class="alert alert-{{ Session::get("msj")["clase"] }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('msj')["msj"]}}</strong>
        </div>

        <br />
    @endif
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <h2 align = "center">Lista de Matriculas</h2>
    </div>

	<table class="table table-hover" id="dataTable">
		<thead>
			<tr>
				<th>#</th>
                <th>Matricula</th>
                <th>Alumno</th>
                <th>Especialidad</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($matriculas as $mat)
				<tr>
					<td>{{ $x++ }}</td>
                    <td>{{ $mat->matricula}}</td>
                    <td>{{ $mat->alumno->nombre." ".$mat->alumno->apaterno." ".$mat->alumno->amaterno}}</td>
                    <td>{{ $mat->especialidade->nombre}}</td>
					<td>
						<!-- Example single danger button -->
							<div class="btn-group">
  								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							Acción
  								</button>
							  <div class="dropdown-menu">
								    {{-- <a class="dropdown-item" href="{{ route("matricula.show",$mat) }}">Mostrar</a> --}}
								    <a class="dropdown-item" href="{{ route('matricula.edit',$mat) }}">Editar</a>
								    <form action="{{ route("matricula.destroy",$mat) }}" method="POST">
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
