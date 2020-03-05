@extends("layouts.frameCasa")
@section("contenido")

	<div class="card ventana-1" style="width: 70%;margin: auto;">
        <div class="card-header">
            Editar Usuario
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('usuario.update',$u->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$u->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Usuario:') }}</label>

                            <div class="col-md-8">
                                <input @if ($u->email === "admin")
                                    readonly="" 
                                @endif id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$u->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo:') }}</label>

                            <div class="col-md-8">
                                <select name="tipo" id="tipo" class="form-control">
                                    @if ($u->tipo === "basico")
                                        <option value="basico">Basico</option>
                                        <option value="admin">Administrador</option>
                                    @else
                                        <option value="admin">Administrador</option>
                                        <option value="basico">Basico</option>
                                    @endif
                                    
                                </select>

                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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


