@extends("layouts.frameCasa")
@section("contenido")

	<div class="card ventana-2">
        <div class="card-header">
            Alta a Especilidad
        </div>
        <div class="card-body">

            <form class="" method="POST" action="{{ route('especialidad.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    <label for="nombre" class="control-label">Nombre:</label>
                    <div class="">
                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                    <label for="descripcion" class="control-label">Descripción:</label>
                    <div class="">
                        <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                        @if ($errors->has('descripcion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('escuela') ? ' has-error' : '' }}">
                    <label for="escuela" class="control-label">Escuela:</label>
                    <div class="">
                        <input id="escuela" type="text" class="form-control" name="escuela" value="{{ old('escuela') }}" required autofocus>

                        @if ($errors->has('escuela'))
                            <span class="help-block">
                                <strong>{{ $errors->first('escuela') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="status" class="control-label">Estatus:</label>

                        <div class="">
                            <input id="status" type="number" class="form-control" name="status" value="{{ old('status') }}" required autofocus>
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
