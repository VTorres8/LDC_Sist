@extends('layouts.appUser')

@section('content')

<table class="table table-hover">
  <h1> Reservas de Sala </h1>
  <thead>
    <tr>
    <td>Sala</td>
    <td>Numero de maquinas</td>
    </tr>
  </thead>
  <tbody>
    @foreach($salas as $sala)
        <tr>
            <td>{{$sala->Nombre_Sala}}</td>
            <td>{{$sala->numero_maquinas}}</td>
			<td>
			</td>
      <td><a href = '/reservas/solicitud/materia/{{$sala->id}}'/>Solicitar para materia</td>
      <td><a href = '/reservas/solicitud/evento/{{$sala->id}}'/>Solicitar para evento</td>
		</tr>
  
    	
		
    @endforeach
  </tbody>
</table>

@endsection