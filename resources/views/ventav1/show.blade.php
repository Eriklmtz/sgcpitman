@extends("layouts.frameCasa")

@section("contenido")

	{{-- @include("layouts.mens") --}}
	@empty($vent)
		<a class="btn btn-primary" href="{{ route("venta.index") }}">Atras</a>
	@else

        <div class="container center" >
            <div class="row">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $vent->observacion}}</h5>
                        <p class="card-text">
                            fecha de cobro: <b>{{ $vent->fecha_cobro }}</b> <br>
                            Monto de Pago: <b>{{ $vent->total }}</b> <br>
                            {{-- @foreach($vent->alumno as $v)
                            Atendió: <b>{{$v->user->name}}</b> <br>
                            Alumno: <b>{{ $v->alumno->nombre.' '.$v->alumno->aPaterno.' '.$v->alumno->aMaterno }}</b>
                            @endforeach --}}
                        </p>
                        <a href="#" class="btn btn-primary">Editar</a>
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
