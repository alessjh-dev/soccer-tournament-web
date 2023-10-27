<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = 'jornada'; 
    protected $fillable = ['numero', 'fecha', 'estadio', 'torneo'];
    public $timestamps = false;
 
}
