@extends("layouts.frameCasa")

@section("contenido")

	{{-- @include("layouts.mens") --}}
	@empty($serv)
		<a class="btn btn-primary" href="{{ route("servicio.index") }}">Atras</a>
	@else
		<div class="row">

            <div class="card col-3">
                <img class="card-img-top" src="" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $serv->concepto }}</h5>
                    <p class="card-text">
                        Precio: <b>{{ $serv->descripcion }}</b> <br>
                        Cantidad: <b>{{ $serv->precio }}</b> <br>
                    </p>
                    <a href="#" class="btn btn-primary">Modificar</a>
                </div>
            </div>

		</div>

	@endempty

@endsection
