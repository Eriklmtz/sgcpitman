@extends("layouts.frameCasa")
@section("contenido")

	<div class="card ventana-2">
        <div class="card-header">
            Alta a Servicio
        </div>
        <div class="card-body">

            <form class="" method="POST" action="{{ route('servicio.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('concepto') ? ' has-error' : '' }}">
                    <label for="concepto" class="control-label">Concepto:</label>
                    <div class="">
                        <input id="concepto" type="text" class="form-control" name="concepto" value="{{ old('concepto') }}" required autofocus>

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
                        <input id="precio" type="text" class="form-control" name="precio" value="{{ old('precio') }}" required autofocus>
                        @if ($errors->has('precio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('precio') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                    <label for="nom" class="control-label">Descripción:</label>
                    <div class="">
                        <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                        @if ($errors->has('descripcion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                    <label for="especialidad" class="control-label">Especialidad:</label>
                    <div class="">
                        <select name="especialidad" id="especialidad" class="form-control">
                            @foreach ($especialidades as $e)
                                <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('especialidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('especialidad') }}</strong>
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
