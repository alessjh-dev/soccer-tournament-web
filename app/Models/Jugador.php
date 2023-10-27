<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugador'; 
    protected $fillable = ['nombres', 'apellidos', 'fecha_nacimiento', 'equipo', 'foto'];
    public $timestamps = false;
 
}
