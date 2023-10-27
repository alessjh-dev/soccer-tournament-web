<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gol extends Model
{
    protected $table = 'goles'; 
    protected $fillable = ['jugador', 'jornada', 'cantidad'];
    public $timestamps = false;
}
