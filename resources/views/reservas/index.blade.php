@extends('layouts.appUser')

@section('content')

<table class="table table-hover">
  <h1> Reservas de Sala </h1>
  <thead>
    <tr>
    <td>Sala</td>
    <td>Status</td>
    <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach($reservas as $reserva)
        <tr>
            <td>{{$reserva->sala->Nombre_Sala}}</td>
            <td>{{$reserva->status}}</td>
            @if ($reserva->status != "Aprobado" && $reserva->status != "Rechazado" )
              <td>
              <form method="post" action="/reservas/{{$reserva->id}}">
    
                {{csrf_field()}}
              <input type="hidden" name="_method" value="DELETE">

              <input type="submit"  onclick="return confirm('¿Seguro que desea cancelar la reserva?')" value="Cancelar">
              
              </form>
              </td>
            @endif  
        </tr>
    @endforeach
  </tbody>
</table>

<table class="table table-hover">
  <h1> Reservas de Maquinas </h1>
  <thead>
    <tr>
    <td>Sala</td>
    <td>Numero de maquina</td>
    <td>Status</td>
    <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach($reservasMaq as $reserva)
        <tr>
            <td>{{$reserva->maquina->sala->Nombre_Sala}}</td>
            <td>{{$reserva->maquina->id}}</td>
            <td>{{$reserva->status}}</td>
            @if ($reserva->status != "Aprobado" && $reserva->status != "Rechazado" )
              <td>
              <form method="post" action="/reservas/maq/{{$reserva->id}}">
    
                {{csrf_field()}}
              <input type="hidden" name="_method" value="DELETE">

              <input type="submit"  onclick="return confirm('¿Seguro que desea cancelar la reserva?')" value="Cancelar">
              
              </form>
              </td>
            @endif  
        </tr>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
