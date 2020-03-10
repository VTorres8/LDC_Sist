@extends('layouts.app')

@section("content")
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

			<td>Numero de Maquinas</td>
		</tr>	
	</thead>
	<tbody>
		@foreach($maquinas as $maquina)
			<tr>
				<td>Modificar</td>
				<td>{{$maquina->id}}</td>
				<td>{{$maquina->ip}}</td>
				<td>{{$maquina->sistema_operativo}}</td>
				<td>{{$maquina->ram}}</td>
				<td>{{$maquina->disco_duro}}</td>
				<td>{{$maquina->programas}}</td>
			</tr>	
		@endforeach
	</tbody>
</table>
@endsection

