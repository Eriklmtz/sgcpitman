@extends("layouts.frameCasa")

@section("contenido")

	{{-- @include("layouts.mens") --}}
	@empty($alum)
		<a class="btn btn-warning" href="{{ route("alumno.index") }}">Atras</a>
	@else
        {{-- <h1>{{ $serv->concepto }}</h1> --}}




        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img class="img-thumbnail " src="{{asset("sb-admin\img\silueta-estudiante.png")}}"  width="300" alt="Card image">
                    <div class="card-body row justify-content-center">
                        <h5 class="card-title">{{ $alum->nombre." ".$alum->apaterno." ".$alum->amaterno }}</h5>
                        <p class="card-text ">{{-- se puede añadir  text-center --}}
                            Correo:<b>{{ $alum->correo }}</b> <br>
                            Telefono: <b>{{ $alum->telefono}}</b> <br>
                            Dirección: <b>{{ $alum->direccion }}</b> <br>
                            Tel. de Emergencia: <b>{{ $alum->tel_emergencia }}</b> <br>
                            Tipo de Alergia: <b>{{ $alum->alergia}}</b> <br>
                        </p>
                        <!--<div class="row justify-content-center">
                            <a href="#" class="btn btn-primary">Editar</a>
                        </div>-->
                    </div>
                </div>

            </div>
            <a class="btn btn-warning" href="{{ route("alumno.index") }}">Atras</a>

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
