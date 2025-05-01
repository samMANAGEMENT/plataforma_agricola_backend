<?php

namespace App\Http\Modules\Empleos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleos extends Model
{
    use HasFactory;

    protected $filleable = [
        'user_id',
        'titulo',
        'descripcion',
        'tipo_trabajo',
        'fecha_inicio',
        'fecha_fin',
        'pago_por_dia',
        'estado_id'
    ];
}
