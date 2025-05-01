<?php

namespace App\Http\Modules\Postulaciones\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulaciones extends Model
{
    use HasFactory;

    protected $filleable = [
        'orden_id',
        'user_id',
        'fecha_asignacion',
        'estado_id',
        'costo_transporte'
    ];
}
