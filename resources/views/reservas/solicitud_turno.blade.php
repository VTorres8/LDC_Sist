@extends('layouts.appUser')

@section('content')
<h1>Ingrese el Turno que desea reservar (aplica para todo el trimestre)</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Turno') }}</div>

                <div class="card-body">

                    <form method="post" action="/reservas">


                        <table>
                        {{csrf_field()}}
                        <tr>
                            <td>
                            @if(empty($turnos))
                                <h4>No hay turnos disponibles</h4>
                            @else
                                @foreach($turnos as $turno)
                                <input type= "checkbox" name="{{$turno->name}}" value="{{$turno->id}}">
                                <label for="{{$turno->name}}">{{$turno->id}}</label><br>
                                @endforeach
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td  align="center">
                                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
                            </td>

                        </tr>
                        <input type="hidden" name="dia" value="{{$request->dia}}">
                        <input type="hidden" name="sala_id" value="{{$id}}">
                        <input type="hidden" name="tipo" value="Materia">
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
