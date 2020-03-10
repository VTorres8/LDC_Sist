@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Crear Perfil') }}</div>

                <div class="card-body">

	<form method="post" action="/preparadores">


		<table>
			<tr>
				<!--<td>Nombre: </td>-->
				<td>
					<div class="form-group row">
					<label for="namep" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
						<div class="col-md-8">
                            <input type="text" class="form-control" name="Nombre_Preparador" value="{{$user->name}}">
                        </div>
                    </div>
					{{csrf_field()}}
				</td>
			</tr>

			<tr>
				<td style="color: red">@error('Nombre_Preparador') {{$message}} @enderror</td>
			</tr>
			<tr>
				<!--<td>Apellido: </td>-->
				<td>
					<div class="form-group row">
					<label for="namea" class="col-md-4 col-form-label text-md-right">{{ __('Apellido:') }}</label>
						<div class="col-md-8">
					<input id="namea" type="text" name="Apellido_Preparador" class="form-control">
					</div>
					</div>
				</td>

			</tr>
			<tr>
				<td style="color: red">@error('Apellido_Preparador') {{$message}} @enderror</td>
            </tr>

            <tr>
				<!--<td>Email: </td>-->
				<td>
					<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email:') }}</label>
						<div class="col-md-8">
					<input id="email" type="text" name="Email" class="form-control">
				</td>

			</tr>
			<tr>
				<td style="color: red">@error('Email') {{$message}} @enderror</td>
            </tr>

            <tr>
				<!--<td>Rango: </td>-->
				<td>
					<div class="form-group row">
					<label for="rango" class="col-md-4 col-form-label text-md-right">{{ __('Rango:') }}</label>
						<div class="col-md-8">
				<select id="rango" name="Rango" class="form-control">
					<option value = "3H">3H</option>
					<option value = "4H">4H</option>
					<option value = "5H">5H</option>
					<option value = "Operador">Operador</option>
          		</select>
				  </div>
				  </div>
				</td>

			</tr>
			<tr>
				<td style="color: red">@error('Rango') {{$message}} @enderror</td>
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
