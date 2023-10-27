<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Incidencia;
use App\Models\Jugador;
use App\Models\TipoTarjeta;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function create()
    {
    $tipo_tarjeta = TipoTarjeta::all();
    $jugadores = Jugador::  all();
    $equipos = Equipo::all();
    return view('incidencias.create', ['tipo_tarjeta' => $tipo_tarjeta, 'jugadores' => $jugadores, 'equipos' => $equipos]);
}

public function store(Request $request)
{
    $request->validate([
        'descripcion' => 'required',
        'tipo_tarjeta' => 'required',
        'fecha_incidencia' => 'required|date',
        'fecha_suspension' => 'nullable|date', // Cambio aquí
        'jugador' => 'required',
    ]);

    $incidencia = new Incidencia;
    $incidencia->descripcion = $request->descripcion;
    $incidencia->tipo_tarjeta = $request->tipo_tarjeta;
    $incidencia->fecha_incidencia = $request->fecha_incidencia;
    $incidencia->fecha_suspension = $request->fecha_suspension;
    $incidencia->jugador = $request->jugador;
    $incidencia->save();

    return redirect()->route('incidencias.create')->with('success', 'Incidencia registrada exitosamente');
}
}
