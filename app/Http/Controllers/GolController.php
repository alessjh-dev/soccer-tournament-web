<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Gol;
use App\Models\Jornada;
use App\Models\Jugador;
use Illuminate\Http\Request;

class GolController extends Controller
{
    public function create()
    {
    $jornadas = Jornada::all();
    $jugadores = Jugador::  all();
    $equipos = Equipo::all();
    return view('goles.create', ['jornadas' => $jornadas, 'jugadores' => $jugadores, 'equipos' => $equipos]);
}

public function store(Request $request)
{
    $request->validate([
        'jugador' => 'required',
        'jornada' => 'required',
        'cantidad' => 'required',
    ]);

    $goles = new Gol;
    $goles->jornada = $request->jornada;
    $goles->cantidad = $request->cantidad;
    $goles->jugador = $request->jugador;
    $goles->save();

    return redirect()->route('goles.create')->with('success', 'Goles registrados exitosamente');
}
}
