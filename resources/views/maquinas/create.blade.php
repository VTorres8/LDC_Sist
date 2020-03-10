@extends('layouts.appAdmin')

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Agregar Máquina') }}</div>

                <div class="card-body">
	                <form method="post" action="/maquinas">


		<table>
			<tr>
				<!--<td>Ip: </td>-->


				<td>
				<div class="form-group row">
					<label for="ip" class="col-md-4 col-form-label text-md-right">{{ __('Ip:') }}</label>
					<div class="col-md-8">
						<input id="ip" type="text" name="ip" class="form-control">
					</div>
				</div>

					{{csrf_field()}}
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
							<input id="so" type="text" name="sistema_operativo" class="form-control">
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
					<input id="ram" type="text" name="ram" class="form-control">
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
					<input id="disco" type="text" name="disco_duro" class="form-control">
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
					<input id="programs" type="text" name="programas" class="form-control">
					</div>
					</div>

				</td>
			</tr>

			<tr>
				<td style="color: red">@error('programas') {{$message}} @enderror</td>
			</tr>

			<tr>

				<td>
					<input type="hidden" name=sala_id value="{{$id ?? ''}}">

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


@endsection
