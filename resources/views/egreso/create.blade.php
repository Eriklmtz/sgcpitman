@extends("layouts.frameCasa")
@section("contenido")
@if(Session::has('msj'))
        <br />
        <div class="alert alert-{{ Session::get("msj")["clase"] }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('msj')["msj"]}}</strong>
        </div>

        <br />
    @endif
	<div class="card ventana-1" style="width: 70%;margin: auto;">
        <div class="card-header">
            <h4>Agregar egreso</h4>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('egreso.store') }}">
                        @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha:') }}</label>

                    <div class="col-md-8">
                        <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha',date("Y-m-d")) }}" required>

                        @error('fecha')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Observación:') }}</label>

                    <div class="col-md-8">
                        <textarea required="" name="descripcion" id="descripcion" class="form-control">

                        </textarea>

                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad:') }}</label>

                    <div class="col-md-8">
                        <input id="cantidad" type="number" step="0.1" class="form-control" name="cantidad" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Guardar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
