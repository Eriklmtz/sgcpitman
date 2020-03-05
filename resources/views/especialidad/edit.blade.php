@extends("layouts.frameCasa") @section("contenido")

<div class="card ventana-2">
    <div class="card-header">
        Editar Especialidad
    </div>
    <div class="card-body">
        <form
            class=""
            method="POST"
            action="{{ route('especialidad.update',$esp->id) }}"
            enctype="multipart/form-data"
        >
            {{ csrf_field() }}
            {{-- para actualizar se usa el método PUT --}}
            {!! method_field("PUT") !!}

            <div
                class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}"
            >
                <label for="nombre" class="control-label">Nombre:</label>
                <div class="">
                    <input
                        id="nombre"
                        type="text"
                        class="form-control"
                        name="nombre"
                        value="{{$esp->nombre }}"
                        required
                        autofocus
                    >

                    @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div
                class="form-group{{ $errors->has('escuela') ? ' has-error' : '' }}"
            >
                <label for="escuela" class="control-label"
                    >Escuela:</label
                >
                <div class="">
                    <input
                        id="escuela"
                        type="text"
                        class="form-control"
                        name="escuela"
                        value="{{$esp->escuela }}"
                        required
                        autofocus
                    />

                    @if ($errors->has('escuela'))
                    <span class="help-block">
                        <strong>{{ $errors->first('escuela') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div
                class="form-group{{ $errors->has('status') ? ' has-error' : '' }}"
            >
                <label for="status" class="control-label">status:</label>
                <div class="">
                    <input
                        id="status"
                        type="text"
                        class="form-control"
                        name="status"
                        value="{{$esp->status }}"
                        required
                        autofocus
                    />

                    @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

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
