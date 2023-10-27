<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }
}
