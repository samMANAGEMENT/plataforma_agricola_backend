<?php

namespace App\Http\Modules\Conductores\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductores extends Model
{
    use HasFactory;

    protected $fillable = [
        'licencia',
        'tipo_vehiculo',
        'capacidad_kg',
        'placa_vehiculo',
        'tipo_id',
        
    ];
}
