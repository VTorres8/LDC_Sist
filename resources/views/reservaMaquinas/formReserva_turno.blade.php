@extends('layouts.appUser')

@section('content')
<h1>Ingrese el Turno que desea reservar </h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Turno') }}</div>

                <div class="card-body">
                    <form method="post" action="/reservas/maq">


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
                                <input type="submit" name="enviar" value="Siguiente" class="btn btn-primary">
                            </td>

                        </tr>
                        <input type="hidden" name="dia" value="{{$request->dia}}">
                        <input type="hidden" name="semana" value="{{$request->semana}}">
                        <input type="hidden" name="maquina_id" value="{{$id}}">
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
