@extends("layouts.frameCasa")

@section("contenido")
    <?php $x = 1; ?>
    <div class="col-1 ">
        <a class="dropdown-item d-flex align-items-center" href="{{ route("servicio.create") }}">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fa fa-plus text-white"></i>
                </div>
            </div>
            </a>
    </div>

	{{-- @include("layouts.mens") --}}
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <h2 align = "center">Lista de servicios</h2>
    </div>

	<table class="table table-hover" id="dataTable">
		<thead>
			<tr>
				<th>#</th>
                <th>Concepto</th>
                <th>Precio</th>
                {{-- <th>Descripcion</th> --}}
                <th>Especialidad</th>

				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($servicios as $s)
				<tr>
					<td> {{ $x++ }}</td>
                    <td>{{ $s->concepto}}</td>
                    <td>{{ $s->precio}}</td>
                    {{-- <td>{{ $s->descripcion}}</td> --}}
                    <td>{{ $s->especialidad->nombre}}</td>
					<td>
						<!-- Example single danger button -->
							<div class="btn-group">
  								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							Acción
  								</button>
							  <div class="dropdown-menu">
								    {{-- <a class="dropdown-item" href="{{ route("servicio.show",$s) }}">Mostrar</a> --}}
								    <a class="dropdown-item" href="{{ route('servicio.edit',$s) }}">Editar</a>
								    <form action="{{ route("servicio.destroy",$s) }}" method="POST">
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
