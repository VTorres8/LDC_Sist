@extends('layouts.appUser')

@section('content')

<table class="table table-hover">
  <h1>Salas</h1>
  <thead>
    <tr>
    <td>Sala</td>
    <td>Numero de maquinas</td>
    <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach($salas as $sala)
        <tr>
            <td>{{$sala->Nombre_Sala}}</td>
            <td>{{$sala->numero_maquinas}}</td>
      <td><a href = '/reservas/solicitud/maquina/{{$sala->id}}'/>Reservar maquina</td>
		</tr>
  
    	
		
    @endforeach
  </tbody>
</table>

@endsection