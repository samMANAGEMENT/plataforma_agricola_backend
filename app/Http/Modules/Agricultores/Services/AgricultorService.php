<?php

namespace App\Http\Modules\Agricultores\Services;

use App\Http\Modules\Agricultores\Models\Agricultor;

class AgricultorService
{
    public function crearAgricultor(array $data)
    {
        return Agricultor::create($data);
    }
}
