@extends('layouts.appUser')

@section('content')
<h1>Ingrese el dia y semana que desea reservar </h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Horario de Reserva') }}</div>

                <div class="card-body">
                <form method="get" action="/reservas/solicitud/maquina/{{$maquina->id}}/form/turno">


                    <table>
                        <tr>
                            <td>Numero de maquina: </td>
                            <td><input type="text" name="maquina" value="{{$maquina->id}}" disabled></td>
                            <td><input type="hidden" name="maquina_id" value="{{$maquina->id}}"></td>
                            {{csrf_field()}}
                        </tr>

                        <tr>
                            <td>Semana: </td>
                            <td>
                            <select name="semana" class="form-control">
                                @foreach(range(1,12) as $semana)
                                    <option value = "{{$semana}}">{{$semana}}</option>
                                @endforeach
                            </select>
                        </tr>

                        <tr>
                            <td>Dia: </td>
                                <td>
                                    <select id="dia" name="dia" class="form-control">
                                        <option value = "Lunes">Lunes</option>
                                        <option value = "Martes">Martes</option>
                                        <option value = "Miercoles">Miércoles</option>
                                        <option value = "Jueves">Jueves</option>
                                        <option value = "Viernes">Viernes</option>
                                    </select>
                                </td>
                        </tr>
                        <tr>
                            <td  align="center">

                                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
                            </td>

                        </tr>



                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<ul>
	@if(count($errors)>0)

		@foreach($errors->all() as $error)

	<li>{{$error}}</li>

		@endforeach
	@endif
</ul>-->
@endsection
