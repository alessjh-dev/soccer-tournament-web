@extends('layouts.app')

@section('content')
<div class="container text-center d-flex justify-content-center" style="min-height: 80vh;">
    <div class="col-md-9 mt-5">
        <h2 class="mb-5" style="color: white;">Información del Jugador</h2>
        <div class="card" style="background-color: #333; color: white; padding: 20px;">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('fotos/') }}/{{ $jugador->foto }}" alt="Foto de {{ $jugador->nombres }}" style="max-width: 220px; max-height: 220px;">
                </div>
                <div class="col-md-9">
                    <h3>{{ $jugador->nombres }} {{ $jugador->apellidos }}</h3>
                    <p>Fecha de Nacimiento: {{ $jugador->fecha_nacimiento }}</p>
                    <p>Edad: {{ $edad }}</p>
                    <p>Goles Anotados: {{ $totalGoles }}</p>
                </div>
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/') }}/{{ $equipo->foto }}" alt="Logo de {{ $equipo->nombre }}" style="max-width: 30px;">
                    <span>{{ $equipo->nombre }}</span>
                </div>
            </div>
            <div class="row" style="color: white;">
            <h3 class="mt-3 mb-3">Amonestaciones</h3>   
            <div class="col-md-6">
                    @foreach ($incidencias as $incidencia)
                        @if ($incidencia->tipo_tarjeta == 1)
                            <p>
                                <img src="{{ asset('images/yellow.png') }}" alt="Tarjeta Amarilla" style="max-height: 20px; vertical-align: middle;" />
                                {{ $incidencia->fecha_incidencia }}
                            </p>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-6">
                    @foreach ($incidencias as $incidencia)
                        @if ($incidencia->tipo_tarjeta == 2)
                            <p>
                                <img src="{{ asset('images/red.png') }}" alt="Tarjeta Roja" style="max-height: 20px; vertical-align: middle;" />
                                {{ $incidencia->fecha_incidencia }}
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>

            <h3>Suspensiones</h3>
            <table class="table" style="background-color: #333;">
                <thead>
                    <tr>
                        <th style="color:white;">Fecha</th>
                        <th style="color:white;">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidencias as $incidencia)
                        @if (!is_null($incidencia->fecha_suspension))
                            <tr>
                                <td style="color:white;">{{ $incidencia->fecha_suspension }}</td>
                                <td style="color:white;"> {{ $incidencia->descripcion }} </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2 style="color: white; margin-top: 20px;">Partidos Jugados</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Jornada</th>
                    <th>Local</th>
                    <th>Visitante</th>
                    <th>Resultado</th>
                    <th>Estadio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidosJugados as $partido)
                <tr>
                    <td>{{ $partido->fecha }}</td>
                    <td>{{ $partido->jornada }}</td>
                    <td>{{ $partido->local }}</td>
                    <td>{{ $partido->visitante }}</td>
                    <td>{{ $partido->goles_local }} - {{ $partido->goles_visitante }}</td>
                    <td>{{ $partido->estadio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2 style="color: white; margin-top: 20px;">Partidos por Jugar</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Jornada</th>
                    <th>Local</th>
                    <th>Visitante</th>
                    <th>Estadio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidosPorJugar as $partido)
                <tr>
                    <td>{{ $partido->fecha }}</td>
                    <td>{{ $partido->jornada }}</td>
                    <td>{{ $partido->local }}</td>
                    <td>{{ $partido->visitante }}</td>
                    <td>{{ $partido->estadio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
