<?php

namespace App\Http\Modules\Usuarios\Models;

use App\Http\Modules\Tipos\Models\Tipo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'nombre',
        'dni',
        'telefono',
        'direccion',
        'email',
        'tipo_id',
        'estado',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }
}



