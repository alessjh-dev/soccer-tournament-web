@extends('layouts.app')

@section('content')
<div class="container text-center d-flex justify-content-center" style="min-height: 80vh;">
    <div class="col-md-9 mt-5">
        <h2 class="mb-5" style="color: white;">Jornadas</h2>
        <div class="card bg-dark" style=" color: white; padding: 20px; border:none;">
            <div class="row">
                <div class="col-4 text-center">
                    <button id="prev-jornada" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Anterior
                    </button>
                </div>
                <div class="col-4 text-center">
                    <p id="jornada-text">Jornada 1 - Fecha</p>
                </div>
                <div class="col-4 text-center">
                    <button id="next-jornada" class="btn btn-primary">
                        Siguiente <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div id="jornada-details" class="mt-4">
            </div>
            <div id="jornada-info" class="mt-4">
                <!-- Agregamos estilos de tabla y una clase para centrar el marcador -->
                <style>
                    .centered {
                        text-align: center;
                    }
                </style>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Local</th>
                            <th class="centered">Marcador</th>
                            <th>Visitante</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
    const jornadas = @json($jornadas);
    let currentIndex = 0;

    function showCurrentJornada() {
        const jornada = jornadas[currentIndex];
        document.getElementById('jornada-text').textContent = `Jornada ${jornada.numero} - ${jornada.fecha}`;

        $.ajax({
            url: `/obtener-informacion-jornada/${jornada.dbid}`,
            method: 'GET',
            success: function (data) {
                $('#jornada-details').html(data);
                const info = data.map(item => {
                    return `
                        <tr>
                            <td><img src="{{ asset('images/') }}/${item.foto_local}" width="30" alt="${item.local}">${item.local}</td>
                            <td class="centered">
                                ${item.local} ${item.goles_local} - ${item.goles_visitante} ${item.visitante}<br>
                                ${formatDate(item.fecha)}<br>
                                ${getMatchStatus(item.fecha)}
                            </td>
                            <td><img src="{{ asset('images/') }}/${item.foto_visitante}" width="30" alt="${item.visitante}">${item.visitante}</td>
                        </tr>
                    `;
                }).join('');
                $('#jornada-info tbody').html(info);
            },
            error: function (error) {
                console.log('Error al cargar la información de la jornada:', error);
            }
        });
    }

    function formatDate(dateTimeString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        return new Date(dateTimeString).toLocaleDateString(undefined, options);
    }

    function getMatchStatus(dateTimeString) {
        const matchDate = new Date(dateTimeString);
        const now = new Date();
        const timeDifference = matchDate - now;
        const minutesDifference = Math.floor(timeDifference / (1000 * 60));

        if (minutesDifference > 90) {
            return 'Por Disputarse';
        } else if (minutesDifference <= 0 && minutesDifference >= -90) {
            return `<span style="color: green;">En Directo (${(minutesDifference-(minutesDifference))-minutesDifference} min)</span>`;
        } else {
            return 'Finalizado';
        }
    }

    $('#prev-jornada').on('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            showCurrentJornada();
        }
    });

    $('#next-jornada').on('click', function () {
        if (currentIndex < jornadas.length - 1) {
            currentIndex++;
            showCurrentJornada();
        }
    });

    showCurrentJornada();
</script>

@endsection
