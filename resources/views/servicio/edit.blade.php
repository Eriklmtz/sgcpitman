@extends("layouts.frameCasa")
@section("contenido")

	<div class="card ventana-2">
        <div class="card-header">
            Editar  Servicio
        </div>
        <div class="card-body">

            <form class="" method="POST" action="{{ route('servicio.update',$serv) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{-- para actualizar se usa el método PUT --}}
                    {!! method_field("PUT") !!}


                    <div class="form-group{{ $errors->has('concepto') ? ' has-error' : '' }}">
                        <label for="concepto" class="control-label">Concepto:</label>
                        <div class="">
                            <input id="concepto" type="text" class="form-control" name="concepto" value="{{$serv->concepto }}" required autofocus>

                            @if ($errors->has('concepto'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('concepto') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                        <label for="precio" class="control-label">Precio:</label>
                        <div class="">
                            <input id="precio" type="text" class="form-control" name="precio" value="{{$serv->precio }}" required autofocus>

                            @if ($errors->has('precio'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('precio') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                        <label for="especialidad" class="control-label">Especialidad:</label>
                        <div class="">
                            <select name="especialidad" id="especialidad" class="form-control">
                                @foreach ($especialidades as $ee)
                                @php
                                    $sel = "";
                                    if ($ee->id == $serv->especialidad_id)
                                        $sel = "selected='selected'";
                                @endphp



                                    <option {{ $sel }} value="{{ $ee->id }}">{{ $ee->nombre }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('especialidad'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('especialidad') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                        <label for="descripcion" class="control-label">Descripción:</label>
                        <div class="">
                            <textarea required="" name="descripcion" id="descripcion" class="form-control" >
                            {{$serv->descripcion }}
                            </textarea>

                            @if ($errors->has('descripcion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

@endsection
