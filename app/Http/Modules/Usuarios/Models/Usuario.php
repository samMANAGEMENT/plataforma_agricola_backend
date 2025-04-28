<?php

namespace App\Http\Modules\Usuarios\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'nombre',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
