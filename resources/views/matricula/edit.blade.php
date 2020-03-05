@extends("layouts.frameCasa")
@section("contenido")
<div class="col-md-8">
	<div class="card ventana-2">
        <div class="card-header">
            Editar  Matricula
        </div>
        <div class="card-body">

            <form class="" method="POST" action="{{ route('matricula.update',$mat) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- para actualizar se usa el método PUT --}}
                {!! method_field("PUT") !!}


                <div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
                    <label for="matricula" class="control-label">Matricula:</label>
                    <div class="col-md-8">
                        <input id="matricula" type="text" class="form-control" name="matricula" value="{{$mat->matricula}}" required autofocus>

                        @if ($errors->has('matricula'))
                            <span class="help-block">
                                <strong>{{ $errors->first('matricula') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                        <label for="especialidad" class="col-md-4 control-label">Especialidad:</label>

                        <div class="col-md-8">
                            {{-- <input id="especialidad" type="text" class="form-control" name="especialidad" value="{{$mat->especialidade->nombre}}" required autofocus> --}}
                            <select name="especialidad" id="especialidad" class="chosen-select form-control">
                                @foreach ($especialidades as $e)
                                    <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                            @if ($errors->has('especialidad'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('especialidad') }}</strong>
                                </span>
                            @endif
                </div>

                <div class="form-group{{ $errors->has('alumno') ? ' has-error' : '' }}">
                    <label for="nom" class="col-md-4 control-label">Alumno:</label>
                    <div class="col-md-8">
                        {{-- <input id="alumno" type="text" class="form-control" name="alumno" value="{{$mat->alumno->nombre}}" required autofocus> --}}
                        <select name="alumno" id="alumno" class="chosen-select form-control">
                            @foreach ($alumnos as $a)
                                <option value="{{ $a->id }}">{{ $a->nombre." ".$a->apaterno." ".$a->amaterno }}</option>
                            @endforeach
                        </select>
                    </div>
                        @if ($errors->has('alumno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alumno') }}</strong>
                            </span>
                        @endif

                </div>



                {{-- <div class="form-group{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                    <label for="especialidad" class="control-label">especialidad:</label>

                    <div class="">
                        <input id="especialidad" type="number" class="form-control" name="especialidad" value="{{ old('especialidad') }}" required autofocus>
                        @if ($errors->has('especialidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('especialidad') }}</strong>
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
</div>

@endsection

@section("script")
    <script>
        $(document).ready(function(){
            $("#especialidad").val("{{ $mat->especialidade->id }}");
            $("#alumno").val("{{ $mat->alumno->id }}");
            $(".chosen-select").trigger("chosen:updated");
        });
    </script>
@endsection