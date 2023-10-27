@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100 bg-dark">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Reporte de jugadores
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <select class="form-control mb-3" style="background-color: #444; color: white;" id="selectJugadores">
                        <option value="">Seleccione un equipo</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->dbid }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary">Generar Reporte</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Reporte de incidencias
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <select class="form-control mb-3" style="background-color: #444; color: white;" id="selectIncidencias">
                        <option value="">Seleccione un equipo</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->dbid }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary">Generar Reporte</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Reporte de goleadores
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <!-- No se requiere un select aquí -->
                    <button class="btn btn-primary">Generar Reporte</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        margin: 10px;
    }
</style>
<script>
    $(document).ready(function () {
        $('button').on('click', function () {
            var tipoReporte = $(this).closest('.card').find('.card-header').text();
            tipoReporte = tipoReporte.trim().toLowerCase().replace(/\s+/g, '');
            var reportName = tipoReporte.replace('reportede', '');
            var equipoId = $(this).closest('.card').find('select').val();
            var url = "{{ route('generar-reporte', [':tipoReporte', ':equipoId']) }}"
                .replace(':tipoReporte', reportName)
                .replace(':equipoId', equipoId);
            window.open(url, '_blank');
        });
    });
</script>

@endsection
