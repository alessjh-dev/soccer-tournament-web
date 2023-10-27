<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class InformeController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('informes.index', ['equipos' => $equipos]);
    } 
    
    public function generarReporte($tipoReporte, $equipoId)
    {
        // Verificar si el equipoId es un valor numérico
        if (!is_numeric($equipoId)) {
            return response()->json(['error' => 'El ID del equipo no es válido.'], 400);
        }

        $equipoId = (int)$equipoId;

        $url = "http://localhost:8080/reports/{$tipoReporte}";
        $data = ['id' => $equipoId];
        $response = Http::post($url, $data);

        if ($response->successful()) {
            $pdf = $response->body();
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="reporte.pdf"',
            ];
            
            return Response::make($pdf, 200, $headers);
        }

        return response()->json(['error' => 'Error al generar el reporte.'], 500);
    }
    
}
