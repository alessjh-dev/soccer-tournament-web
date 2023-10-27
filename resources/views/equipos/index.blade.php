@extends('layouts.app')

@section('content')
<div class="container text-center d-flex justify-content-center" style="min-height: 80vh;">
    <div class="col-md-9 mt-5">
        <h2 style="color: white;">Plantillas</h2>
    
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mt-3">
                    <label for="equipo" style="color: white;">Selecciona el Equipo:</label>
                    <select class="form-control" id="equipo" name="equipo" required style="background-color: #444; color: white;">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->dbid }}" style="color: white;">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-3" id="jugadoresContainer">
        </div>
    </div>
</div>

<script>
    function cargarJugadores(equipoId) {
        var jugadoresContainer = document.getElementById('jugadoresContainer');

        if (equipoId) {
            fetch('/jugadores-por-equipo/' + equipoId)
                .then(response => response.json())
                .then(data => {
                    jugadoresContainer.innerHTML = ''; 
                    data.forEach(jugador => {
                        var card = `
                            <div class="col-md-3 mb-3">
                                <a href="/jugadores/${jugador.dbid}" style="text-decoration: none; color: inherit;">
                                    <div class="card" style="background-color: #333;">
                                        <img src="{{ asset('fotos/') }}/${jugador.foto}" class="card-img-top" alt="Foto de ${jugador.nombres}" style="max-width: 220px; max-height: 220px;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: white;">${jugador.nombres} ${jugador.apellidos}</h5>
                                            <p class="card-text" style="color: white;">Edad: ${calcularEdad(jugador.fecha_nacimiento)} años</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                        jugadoresContainer.insertAdjacentHTML('beforeend', card);
                    });
                })
                .catch(error => {
                    console.log('Error al cargar los jugadores.');
                });
        } else {
            jugadoresContainer.innerHTML = ''; 
        }
    }
    var selectEquipo = document.getElementById('equipo');
    selectEquipo.addEventListener('change', function () {
        var equipoId = selectEquipo.value;
        cargarJugadores(equipoId);
    });

    function calcularEdad(fechaNacimiento) {
        var nacimiento = new Date(fechaNacimiento);
        var hoy = new Date();
        var edad = hoy.getFullYear() - nacimiento.getFullYear();
        var mes = hoy.getMonth() - nacimiento.getMonth();

        if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
            edad--;
        }
        return edad;
    }
    cargarJugadores(selectEquipo.value);
</script>

@endsection
