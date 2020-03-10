@extends('layouts.appAdmin')

@section('content')
<h1>Horario</h1>
</br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Preparador</th>
            <th>Dia</th>
            <th>Horas</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$horario->preparador}}</td>
            <td>{{$horario->dia}}</td>
            <td>{{$horario->hora}}</td>
        </tr>
    </tbody>
</table>
<a href='/horarios'>Volver</a>
</br>
<a href="{{route('horarios.edit', $horario->id)}}">Modificar</a>
@endsection