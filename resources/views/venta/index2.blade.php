@extends("layouts.frameCasa")
@section("contenido")
    

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{ route('pago.index2') }}"  role="form" id="frm-bus" >
                    <legend>Buscar por Fechas</legend>
                        <div class="input-group">
                          <input type="date" class="form-control bg-light border-0 small" name="fi" placeholder="Fecha de Inicio" aria-label="Buscar" aria-describedby="basic-addon2" id="fi" autofocus="" value="{{ empty(request()->fi)?date("Y-m-d"):request()->fi }}" onblur="$('#ft').val($('#fi').val());" required>
                          -
                          <input type="date" class="form-control bg-light border-0 small" name="ft" placeholder="Fecha de Fin" aria-label="Buscar" aria-describedby="basic-addon2" id="ft" autofocus="" value="{{ request()->ft }}" required>
            
                          <select class="form-control bg-light border-0 small" name="tipo" id="tipo">
                            <option value="efectivo">Efectivo</option>
                            <option value="deposito">Deposito</option>
                          </select>
                          <div class="input-group-append">
                            &nbsp;&nbsp;
                            <button class="btn btn-primary" type="submit">
                              <i class="fas fa-search fa-sm"></i>
                            </button>
                          </div>
                        </div>
                </form>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-fw fa-print " > </i></button>
            </div>
        </div>
    </div>



    

    <br><br> <br><br>
    <?php $x = 1; $total = 0; ?>


        @if (!empty($pagos) )

            <div class="container">
                <div class="row">
                    <div colspan="2" class="col-md-2"></div>
                    <div class="col-md-8">
                        <h3 align  = "center">Reporte de Cobros en
                            {{ ucwords(request()->tipo) }}
                            @if (request()->fi === request()->ft)
                                {{ "de la fecha ".request()->fi }}
                            @else
                                {{ " a partir de las fechas ".request()->fi."  al  ".request()->ft }}


                            @endif
                        </h3>

                    </div>
                    <div colspan="2" class="col-md-2"></div>
                </div>
                <br><br>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Folio</th>
                            <th>Fecha de Pago</th>
                            <th>Matricula</th>
                            <th>Alumno</th>
                            <th>Especialidad</th>
                            <th>Pago</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $p)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $p->id}}</td>
                                <td>{{ $p->fecha_cobro }}</td>
                                <td>{{ $p->matricula }}</td>
                                <td>{{ $p->alumno->alumno->nombre }} {{ $p->alumno->alumno->apaterno }} {{ $p->alumno->alumno->amaterno }}</td>
                                <td>{{ $p->alumno->especialidade->nombre }}</td>
                                <td>
                                    @php
                                        $subtotal = 0;
                                        foreach ($p->servicios as $s) {
                                            $subtotal += ($s->pivot->cantidad * $s->pivot->precio_unitario) - $s->pivot->descuento;

                                        }
                                        if($p->status!=0)
                                            $total += $subtotal;
                                        echo "$$subtotal";
                                    @endphp

                                </td>
                                <td>
                                    @if(count($p->servicios) > 0 )
                                    <a href="{{ route('pago.show',$p) }}" target="__new" class="btn btn-info">Mostrar</a>
                                    @php
                                        $get = "1&fi=".request()->fi."&ft=".request()->ft;
                                    @endphp
                                         @if($p->status!=0)
                                            <a href="#" onclick="eliminar('{{ route('pago.destroy',$p) }}{{ "?$get&r=fechas" }}')" class="btn btn-danger">Cancelar</a>
                                        @else
                                             Cancelado
                                        @endif
                                    @else
                                        Cancelado
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        <tr>
                             <td colspan="6" align="right"><b>Total:</b></td>
                             <td>${{ $total }}</td>
                             <td></td>

                        </tr>
                    </tbody>
                </table>




            </div>

        @endif

@endsection


@section("script")
    <script>
            $(document).ready(function() {
                var t = "{{ request()->tipo }}";
                if(t.length > 0){
                    $("#tipo").val(t);

                }
            });

        </script>
@endsection
