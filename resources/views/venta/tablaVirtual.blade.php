	@php
		$x = 1;
		$total = 0;
	@endphp
	@if (isset($carrito["tabla"]))
	<h3>Servicios seleccionados</h3>
	<table class="table table-hover">

		<thead>
			<tr>
				<th>#</th>
				<th>Concepto</th>
                <th>Precio</th>
                <th>Cantidad</th>
				<th>Descuento</th>
                <th>Fecha Correspondiente</th>
                <th>Descripción</th>
                <th>SubTotal</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($carrito["tabla"] as $c)
				@php
					$subtotal = ($c["cantidad"] * $c["precio"]) - $c["descuento"];
					$total += $subtotal;
				@endphp
				<tr>
					<td>{{ $x++ }}</td>
					<td>{{ $c["concepto"] }}</td>
                    <td>{{ $c["precio"] }}</td>
                    <td>{{ $c["cantidad"] }}</td>
                    <td>{{ $c["descuento"] }}</td>
                    <td>{{ $c["fecha"] }}</td>
                    <td>{{ $c["descripcion"] }}</td>
                    <td>{{ $subtotal }}</td>
					<td>
						<button type="button" onclick="eliminarServCarrito('{{ route('pago.eliminar-servicio',$c["id"]) }}')" class="btn btn-danger" title = "Eliminar el concepto">X</button>
					</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="7"></td>
				<td colspan="2"><b>Total: </b>$ {{ $total }}</td>
			</tr>
			<tr>
				<td colspan="7"></td>
				<td colspan="2"><button onclick="cancelarCarrito('{{ route('pago.cancelar') }}')" type="button" class="btn btn-danger">Cancelar</button> | <a href="{{ route('pago.procesa') }}" class="btn btn-success">Aceptar</a></td>

			</tr>
		</tbody>
	</table>

@endif
<script>
	$(document).ready(function(){
		@if (isset($carrito["tabla"]))
			$("#alumno").attr("disabled","disabled");
		@else
			$("#alumno").removeAttr("disabled");
		@endif
		$(".chosen-select").trigger("chosen:updated");

		$("#descripcion").val("");
		$("#descuento").val("0");
		//$("#fecha").val("");
	});
</script>