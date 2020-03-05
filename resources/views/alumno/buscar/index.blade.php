@extends('layouts.frameCasa')
@section('contenido')

<form action="" method="POST" role="form" class="form-inline">
    <div class="form-group">
      <label for="buscar">Buscar: </label>
      <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar Producto">
    </div>
  <button type="button" class="btn btn-primary" onclick="alumnosAjax('{{ route('alumnos.alumnosAjax')}}')">Buscar</button>
</form>
<br/>
<!--Consultar alumnos a traves de AJAX-->
<div id="alumnosAjax"></div>
@endsection

@section("script")
    <script type="text/javascript">
    $(document).ready(function(){
      alumnosAjax('{{ route("alumnos.alumnosAjax") }}');
    });
    </script>
@endsection
