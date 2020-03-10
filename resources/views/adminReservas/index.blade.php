@extends('layouts.appAdmin')

@section('content')

<table class="table table-hover">
  <h1> Reservas de Sala </h1>
  <thead>
    <tr>
    <td>Usuario</td>
    <td>Sala</td>
    <td>Status</td>
    <td></td>
    <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach($reservas as $reserva)
        <tr>
            <td>{{$reserva->user->name}}</td>
            <td>{{$reserva->sala->Nombre_Sala}}</td>
            <td>{{$reserva->status}}</td>
            @if ($reserva->status=="Pendiente")
            <td>
                <form method="post" action="/gestion">
                <input type="hidden" name="tipo" value="sala">
                <input type="hidden" name="id" value="{{$reserva->id}}">
                <input type="hidden" name="status" value="Aprobado">
	
                  {{csrf_field()}}


                <input type="submit"  onclick="return confirm('¿Seguro que desea aprobar la reserva?')" value="Aprobar">

                </form>
            </td>
            <td>
                <form method="post" action="/gestion">
                <input type="hidden" name="tipo" value="sala">
                <input type="hidden" name="id" value="{{$reserva->id}}">
                <input type="hidden" name="status" value="Rechazado">
	
                  {{csrf_field()}}


                <input type="submit"  onclick="return confirm('¿Seguro que desea rechazar la reserva?')" value="Rechazar">

                </form>
            </td>
            
            @endif    
        </tr>
    @endforeach
  </tbody>
</table>

<table class="table table-hover">
  <h1> Reservas de Máquinas </h1>
  <thead>
    <tr>
    <td>Usuario</td>
    <td>Sala</td>
    <td>Número de máquina</td>
    <td>Status</td>
    <td></td>
    <td></td>
    </tr>
  </thead>
  <tbody>
    @foreach($reservasMaq as $reserva)
        <tr>
            <td>{{$reserva->user->name}}</td>
            <td>{{$reserva->maquina->sala->Nombre_Sala}}</td>
            <td>{{$reserva->maquina->id}}</td>
            <td>{{$reserva->status}}</td>
            @if ($reserva->status=="Pendiente")
            <td>
                <form method="post" action="/gestion">
                <input type="hidden" name="tipo" value="maquina">
                <input type="hidden" name="id" value="{{$reserva->id}}">
                <input type="hidden" name="status" value="Aprobado">
	
                  {{csrf_field()}}


                <input type="submit"  onclick="return confirm('¿Seguro que desea aprobar la reserva?')" value="Aprobar">

                </form>
            </td>
            <td>
                <form method="post" action="/gestion">
                <input type="hidden" name="tipo" value="maquina">
                <input type="hidden" name="id" value="{{$reserva->id}}">
                <input type="hidden" name="status" value="Rechazado">
	
                  {{csrf_field()}}


                <input type="submit"  onclick="return confirm('¿Seguro que desea rechazar la reserva?')" value="Rechazar">

                </form>
            </td>
            
            @endif   
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
