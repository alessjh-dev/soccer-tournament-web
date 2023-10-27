@extends('layouts.app')

@section('content')
@yield('welcome-content')
<div class="container text-center d-flex justify-content-center align-items-center vh-100">
    <div class="row">
        <div class="col-md-6 d-md-flex align-items-center"> 
            <img src="{{ asset('images/futsala.png') }}" class="img-fluid d-none d-md-inline d-lg-none" height="400" alt="Imagen de Halland">
            <img src="{{ asset('images/futsala.png') }}" class="img-fluid d-none d-md-none d-lg-inline" height="300" alt="Imagen de Halland">
            <img src="{{ asset('images/futsala.png') }}" class="img-fluid d-sm-none d-md-none d-lg-none" height="150" alt="Imagen de Halland">
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center"> 
            <div class="d-flex flex-column my-auto text-center justify-content-center align-items-center"> 
                <h1 class="display-3 text-white font-weight-bold">SOCCERMANIA</h1> 
                <p class="text-primary font-weight-bold" style="font-size: 20px;">Torneo profesional de fútbol sala</p>
                <div class="d-flex flex-column flex-md-row">
                    <div class="mb-2">
                        <a href="{{ route('equipos.index') }}" class="btn btn-sm py-2 rounded" style="background: transparent; border: none; color: white;">
                            <i class="fa fa-users text-white" aria-hidden="true"></i> Equipos
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('jornada.index') }}" class="btn btn-sm py-2 rounded" style="background: transparent; border: none; color: white;">
                            <i class="fa fa-calendar text-white" aria-hidden="true"></i> Jornadas
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('informe.index') }}" class="btn btn-sm py-2 rounded" style="background: transparent; border: none; color: white;">
                            <i class="fa fa-file-text text-white" aria-hidden="true"></i> Informes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
