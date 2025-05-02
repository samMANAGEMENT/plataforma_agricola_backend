<?php

namespace App\Http\Modules\Transportes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportes extends Model
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
