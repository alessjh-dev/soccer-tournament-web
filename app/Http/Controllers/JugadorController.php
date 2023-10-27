<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Gol;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JugadorController extends Controller
{
    public function create()
    {
        $equipos = Equipo::all();
        return view('jugadores.create', ['equipos' => $equipos]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'equipo' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $jugador = new Jugador;
        $jugador->nombres = $request->nombres;
        $jugador->apellidos = $request->apellidos;
        $jugador->fecha_nacimiento = $request->fecha_nacimiento;
        $jugador->equipo = $request->equipo;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombre_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('fotos'), $nombre_foto);
            $jugador->foto = $nombre_foto;
        }

        $jugador->save();

        return redirect('/jugadores/create')->with('success', 'Jugador registrado exitosamente');
    }

    public function getJugadoresPorEquipo($equipo)
    {
        $jugadores = Jugador::where('equipo', $equipo)->get();

        return response()->json($jugadores);
    }

    public function show($jugador)
    {
        $jugador = Jugador::where('dbid', $jugador)->first();

        if (!$jugador) {
            return redirect()->route('equipos.index')->with('error', 'Jugador no encontrado');
        }

        $goles = Gol::where('jugador', $jugador->dbid)->get();
        $totalGoles = $goles->sum('cantidad');

        $incidencias = Incidencia::where('jugador', $jugador->dbid)->get();

        $fechaNacimiento = Carbon::parse($jugador->fecha_nacimiento);
        $edad = $fechaNacimiento->age;

        $equipo = Equipo::where('dbid', $jugador->equipo)->first();

        $fechaActual = now();

        $partidosJugados = DB::table('datos_jornadas')
            ->where(function ($query) use ($jugador, $fechaActual) {
                $query->where('id_local', $jugador->equipo)
                    ->orWhere('id_visitante', $jugador->equipo);
            })
            ->where('fecha', '<', $fechaActual)
            ->get();

        $partidosPorJugar = DB::table('datos_jornadas')
            ->where(function ($query) use ($jugador, $fechaActual) {
                $query->where('id_local', $jugador->equipo)
                    ->orWhere('id_visitante', $jugador->equipo);
            })
            ->where('fecha', '>', $fechaActual)
            ->get();


        return view('jugadores.index', compact('jugador', 'edad', 'incidencias', 'totalGoles', 'equipo', 'partidosJugados', 'partidosPorJugar'));
    }

}
