@extends("layouts.frameCasa")
@section("contenido")

	<div class="card ventana-2">
        <div class="card-header">
            Alta a Matrícula
        </div>
        <div class="card-body">

            <form class="" method="POST" action="{{ route('matricula.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
                    <label for="matricula" class="control-label">Matricula:</label>
                    <div class="">
                        <input id="matricula" type="text" class="form-control" name="matricula" value="{{ old('matricula') }}" required autofocus>

                        @if ($errors->has('matricula'))
                            <span class="help-block">
                                <strong>{{ $errors->first('matricula') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('alumno') ? ' has-error' : '' }}">
                    <label for="alumno" class="control-label">Alumno:</label>

                    <div class="">
                        <select name="alumno" id="alumno" class="chosen-select form-control">
                            @foreach ($alumnos as $a)
                                <option value="{{ $a->id }}">{{ $a->nombre." ".$a->apaterno." ".$a->amaterno }}</option>
                            @endforeach()
                        </select>
                         @if ($errors->has('alumno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alumno') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                    <label for="especialidad" class="control-label">Especialidad:</label>

                    <div class="">
                        <select name="especialidad" id="especialidad" class="chosen-select form-control">
                            @foreach ($especialidades as $es)
                                <option value="{{ $es->id }}">{{ $es->nombre }}</option>
                            @endforeach()
                        </select>
                         @if ($errors->has('especialidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('especialidad') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>





{{--

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
                    </div> --}}

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
