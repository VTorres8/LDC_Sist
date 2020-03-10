@extends('layouts.appUser')

@section('content')
<h1>Ingrese el dia que desea reservar (aplica para todo el trimestre)
</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Horario de Reserva') }}</div>

                <div class="card-body">

	<form method="get" action="/reservas/solicitud/materia/{{$sala->id}}/turno">


		<table>
		<tr>
			<td>Sala</td>
			<td>
			<input type="text" name="nombre_sala" value="{{$sala->Nombre_Sala}}" disabled>
			</td>




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

				<input type="submit" name="enviar" value="Siguiente" class="btn btn-primary">
			</td>

		</tr>

		</table>
	</form>
<!--<ul>
	@if(count($errors)>0)

		@foreach($errors->all() as $error)

	<li>{{$error}}</li>

		@endforeach
	@endif
</ul>-->
@endsection
