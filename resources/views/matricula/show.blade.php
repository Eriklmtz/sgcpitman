@extends("layouts.frameCasa")

@section("contenido")

	{{-- @include("layouts.mens") --}}
	@empty($mat)
		<a class="btn btn-primary" href="{{ route("matricula.index") }}">Atras</a>
	@else
		{{-- <h1>{{ $serv->concepto }}</h1> --}}
        <div class="container center" >
            <div class="row">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $mat->matricula }}</h5>
                        <p class="card-text">
                            Alumno:<b>{{ $mat->alumno->nombre." ".$mat->alumno->apaterno." ".$mat->alumno->amaterno }}</b> <br>
                            Especilidad: <b>{{ $mat->especialidade->nombre}}</b> <br>
                        </p>
                        <a href="#" class="btn btn-primary">Aceptar</a>
                    </div>
            </div>

        </div>

        {{-- @foreach($alum->ventas as $v)
            <div class="card col-3">
                <img class="card-img-top" src="" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $v->fecha_cobro }}</h5>
                    <p class="card-text">
                        Precio: <b>{{ $v->fecha_cobro }}</b> <br>
                        Cantidad: <b>{{ $v->fecha_cobro }}</b> <br>
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach --}}


	@endempty

@endsection
