@extends("layouts.frameCasa")
@section("contenido")
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{ route('pago.index') }}"  role="form" id="frm-bus"  >
        <legend>Buscar por Matricula del alumno</legend>
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" name="buscar" placeholder="Buscar Matricula" aria-label="Buscar" aria-describedby="basic-addon2" id="buscar" autofocus="" value="{{ request()->buscar }}" required>
              <div class="input-group-append">
                &nbsp;&nbsp;
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
    </form>


    <?php $x = 1; ?>

    @if (!empty($alumno))
        <br />
        <br />

        <h3 align="center">Datos encontrados</h3>
        <table>
            <tbody>

                <tr>
                    <td>Matricula: <b>{{ $alumno->matricula }}</b></td>
                </tr>
                <tr >
                    <td style="width: 800px">  Nombre del Alumno: <b>{{ $alumno->alumno->nombre }} {{ $alumno->alumno->apaterno }} {{ $alumno->alumno->amaterno }}</b></td>

                    <td>  <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-fw fa-print " > </i></button> </td>
                    
                </tr>
                <tr>
                    <td>Especialidad: <b>{{ $alumno->especialidade->nombre }}</b></td>
                </tr>
            </tbody>
        </table>

        @if (!empty($alumno->pagos) )


            <br><br>

            @include('venta.reporteAlumno')
        @else
        <h3>No tiene pagos realizados</h3>
        @endif
    @else
        @if (!empty(request()->buscar))
            <h3>Alumno no encontrado</h3>
        @endif

    @endif

@endsection


