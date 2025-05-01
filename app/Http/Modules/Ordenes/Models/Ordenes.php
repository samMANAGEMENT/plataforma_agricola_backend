<?php

namespace App\Http\Modules\Ordenes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;

    protected $filleable = [
        'user_id',
        'estado_id',
        'direccion_entrega',
        'total'
    ];
}
