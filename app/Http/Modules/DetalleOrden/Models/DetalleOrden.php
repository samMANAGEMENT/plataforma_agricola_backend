<?php

namespace App\Http\Modules\DetalleOrden\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;

    protected  $filleable = [
        'orden_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];
}
