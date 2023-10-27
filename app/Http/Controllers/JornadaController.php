<?php

namespace App\Http\Controllers;

use App\Models\DatosJornadas;
use App\Models\Jornada;

class JornadaController extends Controller
{
    public function index()
    {
        $jornadas = Jornada::all();
        return view('jornadas.index', ['jornadas' => $jornadas]);
    } 

    public function obtenerInformacionJornada($jornadaId) {
        $informacionJornada = DatosJornadas::where('jornada_id', $jornadaId)->get();
    
        return response()->json($informacionJornada);
    }
}
