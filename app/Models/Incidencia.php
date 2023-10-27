<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencias'; 
    protected $fillable = ['descripcion', 'tipo_tarjeta', 'fecha_incidencia', 'fecha_suspension', 'jugador'];
    public $timestamps = false;
 
}
