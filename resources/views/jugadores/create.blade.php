@extends('layouts.app')

@section('content')
<div class="container text-center d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-9" >
        <h2 style="color: white;">Registrar Jugador</h2>
        <form method="POST" action="{{ route('jugadores.store') }}" enctype="multipart/form-data">
            @csrf {{-- Agrega el token CSRF --}}
    
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="nombres" style="color: white;">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required style="background-color: #444; color: white;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="apellidos" style="color: white;">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required style="background-color: #444; color: white;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="fecha_nacimiento" style="color: white;">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required style="background-color: #444; color: white;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="equipo" style="color: white;">Equipo:</label>
                        <select class="form-control" id="equipo" name="equipo" required style="background-color: #444; color: white;">
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->dbid }}">{{ $equipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="foto" style="color: white;">Fotografía:</label>
                <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*" style="background-color: #444; color: white;">
            </div>
    
            <button type="submit" class="btn btn-primary mt-3" style="background-color: #007BFF;">Registrar</button>
        </form>
    </div>
</div>
@endsection
