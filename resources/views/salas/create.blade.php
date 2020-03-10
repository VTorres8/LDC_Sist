@extends('layouts.appAdmin')

@section('content')
<h1>Agregar Sala</h1>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Agregar Sala') }}</div>

                <div class="card-body">

	                <form method="post" action="/salas">


                    <table>
                        <tr>
                            <td>Nombre: </td>
                            <td>

                                <input type="text" name="Nombre_Sala" class="form-control">


                                {{csrf_field()}}
                            </td>
                        </tr>

                        <tr>
                            <td style="color: red">@error('Nombre_Sala') {{$message}} @enderror</td>
                        </tr>
                        <tr>
                            <td>Cantidad de Máquinas: </td>


                            <td>
                                <input type="text" name="numero_maquinas" class="form-control">

                            </td>

                        </tr>
                        <tr>
                            <td style="color: red">@error('numero_maquinas') {{$message}} @enderror</td>
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
<!--<ul>
	@if(count($errors)>0)

		@foreach($errors->all() as $error)

	<li>{{$error}}</li>

		@endforeach
	@endif
</ul>-->
@endsection
