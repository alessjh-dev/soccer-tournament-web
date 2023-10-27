<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\GolController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\JornadaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jugadores/create', [JugadorController::class, "create"])->name('jugadores.create');
Route::get('/jugadores/{jugador}', [JugadorController::class, "show"])->name('jugadores.show');
Route::get('/jugadores-por-equipo/{equipo}', [JugadorController::class, 'getJugadoresPorEquipo'])->name('jugadores-por-equipo');
Route::post('/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
Route::get('/incidencias/create', [IncidenciaController::class, "create"])->name('incidencias.create');
Route::post('/incidencias', [IncidenciaController::class, 'store'])->name('incidencias.store');
Route::get('/goles/create', [GolController::class, "create"])->name('goles.create');
Route::post('/goles', [GolController::class, 'store'])->name('goles.store');
Route::get('/equipos', [EquipoController::class, "index"])->name('equipos.index'); 
Route::get('/jornadas', [JornadaController::class, "index"])->name('jornada.index'); 
Route::get('/informes', [InformeController::class, "index"])->name('informe.index'); 
Route::get('/obtener-informacion-jornada/{jornadaId}', [JornadaController::class, "obtenerInformacionJornada"])->name('obtener-informacion-jornada');
Route::get('/generar-reporte/{tipoReporte}/{equipoId}', [InformeController::class, 'generarReporte'])->name('generar-reporte');
