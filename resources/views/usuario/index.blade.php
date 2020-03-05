@extends("layouts.frameCasa")

@section("contenido")
	@if(Session::has('msj'))
		<br />
		<div class="alert alert-{{ Session::get("msj")["clase"] }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{Session::get('msj')["msj"]}}</strong>
		</div>

		<br />
	@endif
    <?php $x = 1; ?>
    <div class="col-1 ">
        <a class="dropdown-item d-flex align-items-center" href="{{ route("usuario.create") }}">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fa fa-plus text-white"></i>
                </div>
            </div>
            </a>
    </div>


	{{-- @include("layouts.mens") --}}
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <h2 align = "center">Lista de Usuarios</h2>
    </div>


	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Usuario</th>
                <th>Nombre</th>
                <th>Tipo</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $u)
				<tr>
					<td>{{ $x++ }}</td>
                    <td>{{ $u->email}}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->tipo}}</td>
					<td>
						<!-- Example single danger button -->
							<div class="btn-group">
  								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							Acción
  								</button>
							  <div class="dropdown-menu">
								    <a class="dropdown-item" href="{{ route('usuario.edit',$u) }}">Editar</a>
								    <form action="{{ route("usuario.destroy",$u) }}" method="POST">
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
