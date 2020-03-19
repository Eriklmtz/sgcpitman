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
        <div class="col-md-12"><h4 align="center">Recibo de Egreso</h4></div>
    </div>


</div>
<br>
<div class="container">

    <div class="row">
        <div class="col-md-8 "></b>Folio: <b>{{ $egreso->id }}</b></div>
        <div class="col-md-4 ">Atendido por: <b>{{ $egreso->user->name }}</b></div>
    </div>

    <div class="row">
       
        <div class="col-md-4">Fecha: <b>{{ $egreso->fecha}}</b></div>
        
    </div>
    <div class="row">
        <div class="col-md-8">Nombre: <b>{{ $egreso->nombre }} </b></div>
       
    </div>

</div>

<div class="container">

    @php
        $x = 1;
        $total = 0;
    @endphp
    <br />
    <h5 align="center">Egreso</h5>
        <table class="table table-striped">
    
            <thead>
                <tr>
                    <th>#</th>
                    <th>Folio</th>
                    <th>Descripción</th>
                    <th>Monto</th>
    
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $x++ }}</td>
                        <td>{{ $egreso->id}}</td>
                        <td>{{ $egreso->descripcion }}</td>
                        <td>${{ $egreso->monto }}</td>
    
                    </tr>
    
            </tbody>
        </table>
    
    </div>

@endsection