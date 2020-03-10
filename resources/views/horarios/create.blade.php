@extends('layouts.appAdmin')

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Agregar Horario') }}</div>

                <div class="card-body">
	<form method="post" action="/horarios">


		<table>
			<tr>

				<td>
					<input type="hidden" name="preparador" value="{{$user->name}}" >


					{{csrf_field()}}
				</td>
			</tr>
			<tr>
				<!--<td>Día: </td>-->

				<td>
				<div class="form-group row">
					<label for="dia" class="col-md-4 col-form-label text-md-right">{{ __('Día:') }}</label>
						<div class="col-md-8">
				<select id="dia" name="dia" class="form-control">
					<option value = "Lunes">Lunes</option>
					<option value = "Martes">Martes</option>
					<option value = "Miercoles">Miércoles</option>
					<option value = "Jueves">Jueves</option>
					<option value = "Viernes">Viernes</option>
          		</select>
				  		</div>
					</div>
				</td>
			</tr>
			<tr>
				<!--<td>Hora: </td>-->


				<td>
					<div class="form-group row">
					<label for="hora" class="col-md-4 col-form-label text-md-right">{{ __('Hora:') }}</label>
						<div class="col-md-8">
					<input type="text" name="hora" class="form-control">
					</div>
					</div>
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
	</div>
<!--<ul>
	@if(count($errors)>0)

		@foreach($errors->all() as $error)

	<li>{{$error}}</li>

		@endforeach
	@endif
</ul>-->
@endsection
