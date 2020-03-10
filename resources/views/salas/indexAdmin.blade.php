@extends('layouts.appAdmin')

@section("content")

<h1>Salas</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<td></td>
			<td>Nombre Sala</td>
			<td>Número de Máquinas</td>
		</tr>	
	</thead>
	<tbody>
		@foreach($salas as $sala)
			<tr>
				<td><a href="{{route('salas.edit', $sala->id)}}"/>Modificar</td>
				<td><a href='/salas/{{$sala->id}}/maquinas'/>{{$sala->Nombre_Sala}}</td>
				<td>{{$sala->numero_maquinas}}</td>
			</tr>	
		@endforeach
	</tbody>
</table>

@endsection

