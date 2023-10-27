@extends('layouts.app')

@section('content')
<div class="container text-center d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-9">
        <h2 style="color: white;">Registrar Goles</h2>
        <form method="POST" action="{{ route('goles.store') }}" enctype="multipart/form-data">
            @csrf {{-- Agrega el token CSRF --}}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="cantidad" style="color: white;">Número de Goles:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required style="background-color: #444; color: white;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="jornada" style="color: white;">Jornada:</label>
                        <select class="form-control" id="jornada" name="jornada" required style="background-color: #444; color: white;">
                            @foreach ($jornadas as $jornada)
                                <option value="{{$jornada->dbid }}" style="color: white;">{{ $jornada->numero }} - {{ $jornada->fecha }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="equipo" style="color: white;">Equipo:</label>
                        <select class="form-control" id="equipo" name="equipo" required style="background-color: #444; color: white;">
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->dbid }}" style="color: white;">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3" id="jugador-group" style="display: none;">
                        <label for="jugador" style="color: white;">Jugador:</label>
                        <select class="form-control" id="jugador" name="jugador" required style="background-color: #444; color: white;"></select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="background-color: #007BFF;">Registrar</button>
        </form>
    </div>
</div>
<script>
    document.getElementById('equipo').addEventListener('change', function () {
        var equipoSelect = document.getElementById('equipo');
        var jugadorSelect = document.getElementById('jugador');
        var jugadorGroup = document.getElementById('jugador-group');
        var equipoId = equipoSelect.value;
        if (equipoId) {
            fetch('/jugadores-por-equipo/' + equipoId)
                .then(response => response.json())
                .then(data => {
                    jugadorSelect.innerHTML = '';
                    data.forEach(jugador => {
                        var option = document.createElement('option');
                        option.value = jugador.dbid;
                        option.textContent = jugador.nombres + ' ' + jugador.apellidos;
                        jugadorSelect.appendChild(option);
                    });
                    jugadorGroup.style.display = 'block';
                });
        } else {
            jugadorGroup.style.display = 'none';
        }
    });
</script>
@endsection
