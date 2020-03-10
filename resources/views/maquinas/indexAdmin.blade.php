@extends('layouts.appAdmin')

@section("content")

	<h1>Maquinas de la Sala {{$nombresala ?? ''}}</h1>
	</br>
	<table class="table table-hover">
		<thead>
		<tr>

			<td></td>
			<td>Nro</td>
			<td>Ip</td>
			<td>Sistema Operativo</td>
			<td>Ram</td>
			<td>Disco Duro</td>
			<td>Programas</td>

		</tr>
		</thead>
		<tbody>
		@foreach($maquinas as $maquina)
		<tr>
			<td><a href="{{route('maquinas.edit', $maquina->id)}}"/>Modificar</td>
			<td>{{$maquina->id}}</td>
			<td>{{$maquina->ip}}</td>
			<td>{{$maquina->sistema_operativo}}</td>
			<td>{{$maquina->ram}}</td>
			<td>{{$maquina->disco_duro}}</td>
			<td>{{$maquina->programas}}</td>
		</tr>
		@endforeach
		</tbody>
		<tr>
            <td><a href="/maquinas/create/{{$id}}"/>Agregar Maquina</td>



		</tr>
	</table>

@endsection
