<?php

namespace App\Http\Modules\Productos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $filleable = [
        'user_id',
        'nombre',
        'tipo',
        'precio_por_kg',
        'cantidad_disponible',
        'fecha_cosecha',
        'descripcion'
    ];
}
