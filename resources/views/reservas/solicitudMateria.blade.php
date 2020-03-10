@extends('layouts.appUser')

@section('content')
<h1>Solicitud</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Horario de Reserva') }}</div>

                <div class="card-body">

	                <form method="post" action="/reservas">


                        <table>
                            <tr>
                                <td>Sala: </td>
                                <td><input type = "text" name="sala" value="{{$sala->Nombre_Sala}}" disabled></td>
                                <td><input type ="hidden" name="sala_id" value="{{$sala->id}}"></td>
                                {{csrf_field()}}
                            </tr>

                            <input type = "hidden" name="tipo" value="Materia">

                            <tr>
                                <td>Turno: </td>
                            </tr>
                            <tr>

                                <td>

                                    <div class="mx-auto" style="width: 150px;">
                                        <div class="card">
                                            <div class="card-body">
                                                <label class="checkbox-inline"><input type="checkbox" name="hora1" value="1">1</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora2" value="2">2</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora3" value="3">3</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora4" value="4">4</label>
                                                <br>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora5" value="5">5</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora6" value="6">6</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora7" value="7">7</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora8" value="8">8</label>
                                                <br>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora9" value="9">9</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora10" value="10">10</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="hora11" value="11">11</label>
                                                <br>
                                            </div>
                                        </div>

                                    </div>

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
                                <td>

                                    <!--<input type="submit" name="enviar" value="Enviar">-->
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
