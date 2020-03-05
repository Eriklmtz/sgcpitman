@if (request()->tipo == "alumno")
	@foreach ($servicios as $s)
		<option value="{{ $s->id }}">{{ $s->concepto }}</option>
		
	@endforeach
@endif