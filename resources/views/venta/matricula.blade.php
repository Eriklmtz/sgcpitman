
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <span class="border border-info rounded-lg ">


	<table class="table table-hover">
		<thead>
			<tr>

                <th>Matricula</th>
                <th>Alumno</th>
                <th>Especialidad</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($res_alumno as $ra)
				<tr>

                    <td>{{ $ra->matricula}}</td>
                    <td>{{ $ra->nombre." ".$ra->apaterno." ".$ra->amaterno}}</td>
                    @foreach($res_especialidad as $re)
                        <td>{{ $re->nombre}}</td>
                    @endforeach
                    {{-- <td>{{ $mat->alumno->nombre}}</td> --}}


				</tr>
			@endforeach
		</tbody>
    </table>
</span>
</div>



