<?php

namespace App\Http\Modules\Agricultores\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agricultor extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificacion_organica',
        'cantidad',
        'ubicacion_lat',
        'ubicacion_lon',
        'tipo_id'
    ];

}
