<?php

namespace App\Http\Modules\Minoristas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minoristas extends Model
{
    use HasFactory;

    protected $filleable = [
        'tipo_negocio',
        'rut',
        'nombre_negocio',
        'tipo_id'
    ];
}
