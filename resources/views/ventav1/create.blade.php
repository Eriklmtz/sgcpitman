@extends("layouts.frameCasa")
@section("contenido")

	<div class="card ventana-2">
        <div class="card-header">
            Realizar Venta
        </div>
        <div class="card-body">

            <form class="" method="POST" action="{{ route('venta.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#servicios" aria-expanded="true" >
                      <i class="fas fa-fw fa-wrench"></i>
                      <span>servicios</span>
                    </a>
                    <div id="servicios" class="collapse" aria-labelledby="headingUtilities" >
                      <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                        <b class="collapse-item">  </b>
                        <b class="collapse-item">Borders</b>
                        <b class="collapse-item">Animations</b>
                        <b class="collapse-item">Other</b>
                      </div>
                    </div>
                </li>

                <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                    <label for="nom" class="control-label">kkkkk</label>
                    <div class="">
                        <input id="" type="text" class="form-control" name="" value="{{ old('') }}" required autofocus>

                        @if ($errors->has(''))
                            <span class="help-block">
                                <strong>{{ $errors->first('') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                    <label for="nom" class="control-label">Nombre:</label>
                    <div class="">
                        <input id="nom" type="text" class="form-control" name="nombre" value="{{ old('nom') }}" required autofocus>

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
                        <input id="apaterno" type="text" class="form-control" name="apaterno" value="{{ old('apaterno') }}" required autofocus>

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
                        <input id="amaterno" type="text" class="form-control" name="amaterno" value="{{ old('amaterno') }}" required autofocus>

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
                        <input id="correo" type="text" class="form-control" name="correo" value="{{ old('correo') }}" required autofocus>

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
                        <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus>
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
                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required autofocus>
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
                        <input id="alergia" type="text" class="form-control" name="alergia" value="{{ old('alergia') }}" required autofocus>
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
                        <input id="tel-emergencia" type="text" class="form-control" name="tel-emergencia" value="{{ old('tel-emergencia') }}" required autofocus>
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
