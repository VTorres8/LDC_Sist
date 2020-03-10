@extends('layouts.appAdmin')

@section('content')

    <h1>Horario</h1>
	</br>
	<table class="table table-hover">
		<tr>
			<th>Lunes</th>
			@for ($i = 1; $i < $highest; $i++)
				<td></td>
			@endfor
		</tr>
            @foreach($horarios as $horario)
                @if ($horario->dia == "Lunes")
                    <td><a href="{{route('horarios.show', $horario->id)}}">{{$horario->preparador}}
                    </br>{{$horario->hora}}</a></td>
                @endif
            @endforeach
            @if ($horarios->where('dia', "Lunes")->count() == 0)
                <td> -</td>
                @for ($i = 1; $i < $highest; $i++)
                    <td></td>
                @endfor
            @elseif ($horarios->where('dia', "Lunes")->count() < $highest)
                @for ($i = 0; $i < $highest - $horarios->where('dia', "Lunes")->count(); $i++)
                    <td></td>
                @endfor
            @endif
		<tr>
			<th>Martes</th>
			@for ($i = 1; $i < $highest; $i++)
				<td></td>
			@endfor
		</tr>
			@foreach($horarios as $horario)
				@if ($horario->dia == "Martes")
					<td><a href="{{route('horarios.show', $horario->id)}}">{{$horario->preparador}}</td>
				@endif
			@endforeach
			@if ($horarios->where('dia', "Martes")->count() == 0)
				<td> -</td>
				@for ($i = 1; $i < $highest; $i++)
					<td></td>
				@endfor
			@elseif ($horarios->where('dia', "Martes")->count() < $highest)
				@for ($i = 0; $i < $highest - $horarios->where('dia', "Martes")->count(); $i++)
					<td></td>
				@endfor
			@endif
		<tr>
			<th>Miercoles</th>
			@for ($i = 1; $i < $highest; $i++)
				<td></td>
			@endfor
		</tr>
			@foreach($horarios as $horario)
				@if ($horario->dia == "Miercoles")
					<td><a href="{{route('horarios.show', $horario->id)}}">{{$horario->preparador}}</td>
				@endif
			@endforeach
			@if ($horarios->where('dia', "Miercoles")->count() == 0)
				<td> -</td>
				@for ($i = 1; $i < $highest; $i++)
					<td></td>
				@endfor
			@elseif ($horarios->where('dia', "Miercoles")->count() < $highest)
				@for ($i = 0; $i < $highest - $horarios->where('dia', "Miercoles")->count(); $i++)
					<td></td>
				@endfor
			@endif
		<tr>
			<th>Jueves</th>
			@for ($i = 1; $i < $highest; $i++)
				<td></td>
			@endfor
		</tr>
			@foreach($horarios as $horario)
				@if ($horario->dia == "Jueves")
					<td><a href="{{route('horarios.show', $horario->id)}}">{{$horario->preparador}}</td>
				@endif
			@endforeach

			@if ($horarios->where('dia', "Jueves")->count() == 0)
				<td> -</td>
				@for ($i = 1; $i < $highest; $i++)
					<td></td>
				@endfor
			@elseif ($horarios->where('dia', "Jueves")->count() < $highest)
				@for ($i = 0; $i < $highest - $horarios->where('dia', "Jueves")->count(); $i++)
					<td></td>
				@endfor
			@endif
		<tr>
			<th>Viernes</th>
			@for ($i = 1; $i < $highest; $i++)
				<td></td>
			@endfor
		</tr>
			@foreach($horarios as $horario)
				@if ($horario->dia == "Viernes")
					<td><a href="{{route('horarios.show', $horario->id)}}">{{$horario->preparador}}</td>
				@endif
			@endforeach
			@if ($horarios->where('dia', "Viernes")->count() == 0)
				<td> -</td>
				@for ($i = 1; $i < $highest; $i++)
					<td></td>
				@endfor
			@elseif ($horarios->where('dia', "Viernes")->count() < $highest)
				@for ($i = 0; $i < $highest - $horarios->where('dia', "Viernes")->count(); $i++)
					<td></td>
				@endfor
			@endif

	</table>

	<a href="/horarios/create">Agregar Horario</a>

@endsection
