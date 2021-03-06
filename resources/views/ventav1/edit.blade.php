@extends("layouts.frameCasa")
@section("contenido")

	<div class="card ventana-2">
        <div class="card-header">
            Editar  Venta
        </div>
        <div class="card-body">

        <form class="" method="POST" action="{{ route('alumno.update',$alum) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- para actualizar se usa el método PUT --}}
                {!! method_field("PUT") !!}


                <div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
                    <label for="nom" class="control-label">Matrícula:</label>
                    <div class="">
                        <input id="matricula" type="text" class="form-control" name="matricula" value="{{$alum->nctrl }}" required autofocus>

                        @if ($errors->has('matricula'))
                            <span class="help-block">
                                <strong>{{ $errors->first('matricula') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                    <label for="nom" class="control-label">Nombre:</label>
                    <div class="">
                        <input id="nom" type="text" class="form-control" name="nombre" value="{{$alum->nombre }}" required autofocus>

                        @if ($errors->has('nom'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nom') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('apaterno') ? ' has-error' : '' }}">
                    <label for="apaterno" class="control-label">Apellido Paterno:</label>

                    <div class="">
                        <input id="apaterno" type="text" class="form-control" name="apaterno" value="{{ $alum->aPaterno }}" required autofocus>

                        @if ($errors->has('apaterno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apaterno') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('amaterno') ? ' has-error' : '' }}">
                    <label for="amaterno" class="control-label">Apellido Materno:</label>

                    <div class="">
                        <input id="amaterno" type="text" class="form-control" name="amaterno" value="{{ $alum->aMaterno }}" required autofocus>

                        @if ($errors->has('amaterno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('amaterno') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                    <label for="correo" class="control-label">Correo:</label>

                    <div class="">
                        <input id="correo" type="text" class="form-control" name="correo" value="{{$alum->correo }}" required autofocus>

                        @if ($errors->has('correo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('correo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>



                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                    <label for="telefono" class="control-label">Telefono:</label>

                    <div class="">
                        <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $alum->telefono }}" required autofocus>
                        @if ($errors->has('telefono'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                    <label for="direccion" class="control-label">Direccion:</label>

                    <div class="">
                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{$alum->direccion }}" required autofocus>
                        @if ($errors->has('direccion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('alergia') ? ' has-error' : '' }}">
                    <label for="alergia" class="control-label">Alergia:</label>

                    <div class="">
                        <input id="alergia" type="text" class="form-control" name="alergia" value="{{ $alum->alergia }}" required autofocus>
                        @if ($errors->has('alergia'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alergia') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tel-emergencia') ? ' has-error' : '' }}">
                    <label for="tel-emergencia" class="control-label">Teléfono de Emergencia:</label>

                    <div class="">
                        <input id="tel-emergencia" type="text" class="form-control" name="tel-emergencia" value="{{ $alum->num_emergencia }}" required autofocus>
                        @if ($errors->has('tel-emergencia'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tel-emergencia') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="status" class="control-label">Estatus:</label>

                        <div class="">
                            <input id="status" type="number" class="form-control" name="status" value="{{ $alum->status }}" required autofocus>
                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                {{-- <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label for="status" class="control-label">status:</label>

                    <div class="">
                        <input id="status" type="number" class="form-control" name="status" value="{{ old('status') }}" required autofocus>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> --}}

                {{-- <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                    <label for="cat" class="control-label">Categoria:</label>

                    <div class="">
                        <select name="cat" id="cat" class="form-control">
                            @foreach ($categorias as $c)
                                <option value="{{ $c->idCat }}">{{ $c->nomCat }}</option>
                            @endforeach()
                        </select>
                         @if ($errors->has('direccion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> --}}

                {{-- <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                    <label for="direccion" class="control-label">Imagen:</label>

                    <div class="">
                        <input id="img" type="file" class="form-control" name="img" value="{{ old('img') }}">
                        @if ($errors->has('img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('img') }}</strong>
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
