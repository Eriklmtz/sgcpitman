<table class="table table-hover" id="dataTable" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Folio</th>
                        <th>Fecha de Pago</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumno->pagos as $p)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>{{ $p->id}}</td>
                            <td>{{ $p->fecha_cobro }}</td>

                            <td>
                                @if(count($p->servicios) > 0)
                                <a href="{{ route('pago.show',$p) }}" target="__new" class="btn btn-info">Mostrar Servicios</a>

                                    |
                                <a href="#" onclick="eliminar('{{ route('pago.destroy',$p) }}{{ "?buscar=".request()->buscar."&r=alumno" }}')" class="btn btn-danger">Cancelar</a>
                                @else
                                    Cancelado
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       