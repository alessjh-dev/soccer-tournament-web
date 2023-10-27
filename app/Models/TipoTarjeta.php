<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTarjeta extends Model
{
    protected $table = 'tipo_tarjeta'; 
    protected $fillable = ['descripcion'];
    public $timestamps = false;
 
}
