@extends("layouts.frameCasa")
@section("contenido")

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset("sb-admin\img\logo_pitman.jpg") }}" width="100" alt="logo">
        </div>
        <div class="col-md-8">
            <H2 align="center">INSTITUTO EJECUTIVO PITMAN A.C.</H2>
            <h4 align="center">clave: 20PBT0055D</h4>
        </div>
    </div>
<br>
    
    <div class="row">
        @if($pago->status!=0)
            <div class="col-md-12"><h4 align="center">Recibo de Pago</h4></div>
        @else
            <div class="col-md-12"><h4 align="center">Recibo de Pago CANCELADO</h4></div>
        @endif
    </div>


</div>
<br>
<div class="container">

    <div class="row">
        <div class="col-md-8 "></b>Folio: <b>{{ $pago->id }}</b></div>
        <div class="col-md-4 ">Atendido por: <b>{{ $pago->user->name }}</b></div>
    </div>

    <div class="row">
        <div class="col-md-8">Matrícula: <b>{{ $pago->alumno->matricula}} </b></div>
        <div class="col-md-4">Fecha de cobro: <b>{{ $pago->fecha_cobro }}</b></div>
        
    </div>
    <div class="row">
        <div class="col-md-8">Nombre del Alumno: <b>{{ $pago->alumno->alumno->nombre }} {{ $pago->alumno->alumno->apaterno }} {{ $pago->alumno->alumno->amaterno }}</b></div>
        <div class="col-md-4">Tipo de pago: <b>{{ ucwords($pago->tipo) }}</b></div>
    </div>

    <div class="row">
        <div class="col-md-8">Especialidad: <b>{{ $pago->alumno->especialidade->nombre }}</b></div>
    </div>



</div>

<div class="container">

@php
	$x = 1;
	$total = 0;
@endphp
<br />
<h5 align="center">Servicios</h5>
	<table class="table table-striped">

		<thead>
			<tr>
				<th>#</th>
                <th>Concepto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Descuento</th>
                <th>Fecha Correspondiente</th>
                <th>Observación</th>
                <th>SubTotal</th>

			</tr>
		</thead>
		<tbody>
			@foreach($pago->servicios as $s)
				@php
					$subtotal = ($s->pivot->cantidad * $s->pivot->precio_unitario) - $s->pivot->descuento;
					$total += $subtotal;
				@endphp
				<tr>
					<td>{{ $x++ }}</td>
                    <td>{{ $s->concepto }}</td>
                    <td>$ {{ $s->pivot->precio_unitario }}</td>
                    <td>{{ $s->pivot->cantidad }}</td>
                    <td>$ {{ $s->pivot->descuento }}</td>
                    <td>{{ $s->pivot->fecha_pago_servicio }}</td>
                    <td>{{ $s->pivot->descripcion }}</td>
                    <td>$ {{ $subtotal }}</td>

				</tr>
			@endforeach
			<tr>
				<td colspan="7" style="text-align: right;"><b>Total: </b></td>
				<td >$ {{ $total }}</td>
			</tr>

		</tbody>
    </table>

</div>
@endsection
