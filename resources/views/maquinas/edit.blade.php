@extends('layouts.appAdmin')

@section('content')
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Modificar Máquina') }}</div>

                <div class="card-body">
	<form method="post" action="/maquinas/{{$maquina->id}}">


		<table>
			<tr>
				<!--<td>Ip: </td>-->


				<td>
				<div class="form-group row">
					<label for="ip" class="col-md-4 col-form-label text-md-right">{{ __('Ip:') }}</label>
					<div class="col-md-8">
					<input id="ip" type="text" name="ip" value="{{$maquina->ip}}" class="form-control">
					</div>
					</div>


					{{csrf_field()}}
					<input type="hidden" name="_method" value="PUT">
				</td>
			</tr>

			<tr>
				<td style="color: red">@error('ip') {{$message}} @enderror</td>
			</tr>


			<tr>
				<!--<td>Sistema Operativo: </td>-->


				<td>
					<div class="form-group row">
					<label for="so" class="col-md-4 col-form-label text-md-right">{{ __('Sistema Operativo:') }}</label>
					<div class="col-md-8">
					<input id="so" type="text" name="sistema_operativo" value="{{$maquina->sistema_operativo}}" class="form-control">
					</div>
					</div>
				</td>
			</tr>

			<tr>
				<td style="color: red">@error('sistema_operativo') {{$message}} @enderror</td>
			</tr>

			<tr>
				<!--<td>Ram: </td>-->


				<td>
					<div class="form-group row">
					<label for="ram" class="col-md-4 col-form-label text-md-right">{{ __('Ram:') }}</label>
					<div class="col-md-8">
					<input id="ram" type="text" name="ram" value="{{$maquina->ram}}" class="form-control">
					</div>
					</div>

				</td>
			</tr>

			<tr>
				<td style="color: red">@error('ram') {{$message}} @enderror</td>
			</tr>

			<tr>
				<!--<td>Disco duro: </td>-->


				<td>
					<div class="form-group row">
					<label for="disco" class="col-md-4 col-form-label text-md-right">{{ __('Disco Duro:') }}</label>
					<div class="col-md-8">
					<input id="disco" type="text" name="disco_duro" value="{{$maquina->disco_duro}}" class="form-control">
					</div>
					</div>

				</td>
			</tr>

			<tr>
				<td style="color: red">@error('disco_duro') {{$message}} @enderror</td>
			</tr>

			<tr>
				<!--<td>Programas: </td>-->


				<td>
					<div class="form-group row">
					<label for="programs" class="col-md-4 col-form-label text-md-right">{{ __('Programas:') }}</label>
					<div class="col-md-8">
					<input id="programs" type="text" name="programas" value="{{$maquina->programas}}" class="form-control">
					</div>
					</div>
				</td>
			</tr>

			<tr>
				<td style="color: red">@error('programas') {{$message}} @enderror</td>
			</tr>

			<tr>

				<td>
					<input type="hidden" name=sala_id value="{{$maquina->sala_id}}">

				</td>

			</tr>

			<tr>
				<td>
                    <center>
                        <input type="submit" name="modificar" value="Modificar" class="btn btn-primary">
                    <center>
				</td>

			</tr>



		</table>
	</form>
	</br>
	<form method="post" action="/maquinas/{{$maquina->id}}">

			{{csrf_field()}}
		<input type="hidden" name="_method" value="DELETE" >

        <center>
            <input type="submit"  onclick="return confirm('¿Seguro que desea eliminar?')" value="Eliminar Maquina" class="btn btn-primary">
        </center>



	</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

@endsection
