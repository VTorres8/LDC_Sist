@extends('layouts.appAdmin')

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Modificar Horario') }}</div>

                <div class="card-body">
	<form method="post" action="/horarios/{{$horario->id}}">


		<table>
			<tr>


				<td>
					<input type="hidden" name="preparador" value="{{$horario->preparador}}">


					{{csrf_field()}}
					<input type="hidden" name="_method" value="PUT">
				</td>
			</tr>
			<tr>
				<td style="color: red">@error('Nombre_Sala') {{$message}} @enderror</td>
			</tr>

			<tr>
				<!--<td>Dia: </td>-->


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
					<input id="hora" type="text" name="hora" value="{{$horario->hora}}" class="form-control">
					</div>
					</div>
				</td>
			</tr>
			<tr>
				<td style="color: red">@error('numero_maquinas') {{$message}} @enderror</td>
			</tr>

			<tr>
				<td>
					<center>
					    <input type="submit" name="enviar" value="Actualizar" class="btn btn-primary">
					</center>
                </td>

			</tr>



		</table>
	</form>
	</br>

	<form method="post" action="/horarios/{{$horario->id}}">

		{{csrf_field()}}
	<input type="hidden" name="_method" value="DELETE">

    <center>
	    <input type="submit"  onclick="return confirm('¿Seguro que desea eliminar?')" value="Eliminar Horario" class="btn btn-primary">
    </center>

   </form>
   	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
@endsection
