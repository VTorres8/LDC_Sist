@extends('layouts.appAdmin')

@section('content')
    <h1>Modificar Sala</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Modificar') }}</div>

                    <div class="card-body">

                <form method="post" action="/salas/{{$sala->id}}">


                    <table>
                        <tr>
                            <td>Nombre: </td>


                            <td>
                                <input type="text" class="form-control" name="Nombre_Sala" value="{{$sala->Nombre_Sala}}">


                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                            </td>
                        </tr>
                        <tr>
                            <td style="color: red">@error('Nombre_Sala') {{$message}} @enderror</td>
                        </tr>

                        <tr>
                            <td>Cantidad de Máquinas: </td>


                            <td>
                                <input type="text" class="form-control" name="numero_maquinas" value="{{$sala->numero_maquinas}}">

                            </td>
                        </tr>
                        <tr>
                            <td style="color: red">@error('numero_maquinas') {{$message}} @enderror</td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" name="enviar" value="Actualizar" class="btn btn-primary">

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
