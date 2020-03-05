@extends("layouts.frameCasa")

@section("contenido")
    <?php $x = 1;?>
    <div class="col-1 ">
        <a class="dropdown-item d-flex align-items-center" href="{{ route("especialidad.create") }}">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fa fa-plus text-white"></i>
                </div>
            </div>
            </a>
    </div>



	{{-- @include("layouts.mens") --}}
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <h2 align = "center">Lista de Especialidades</h2>
    </div>

    @if (session('msj'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session('msj')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
    @endif


	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
                <th>Nombre</th>
                {{-- <th>Descripcion</th> --}}
                <th>Escuela</th>
                <th>Estado</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($especialidades as $esp)
				<tr>
					<td>{{ $x++ }}</td>
                    <td>{{ $esp->nombre}}</td>
                    {{-- <td>{{ $esp->descripcion }}</td> --}}
                    <td>{{ $esp->escuela }}</td>
                    @if ($esp->status == 1)
                        <td>Activa</td>
                    @else
                        <td>Inactiva</td>
                    @endif

					<td>
						<!-- Example single danger button -->
							<div class="btn-group">
  								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							Acción
  								</button>
							    <div class="dropdown-menu">
								    {{-- <a class="dropdown-item" href="{{ route("especialidad.show",$esp) }}">Mostrar</a> --}}
								    <a class="dropdown-item" href="{{ route('especialidad.edit',$esp->id) }}">Editar</a>
								    <form action="{{ route("especialidad.destroy", $esp->id) }}" method="POST">
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
