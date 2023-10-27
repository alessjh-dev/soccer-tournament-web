<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', ['equipos' => $equipos]);
    } 
}
