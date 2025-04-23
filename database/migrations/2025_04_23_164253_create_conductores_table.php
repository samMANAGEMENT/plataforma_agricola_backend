<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conductores', function (Blueprint $table) {
            $table->id('conductor_id');
            $table->string('licencia')->unique();
            $table->enum('tipo_vehiculo', ['camion', 'furgoneta', 'pickup']); // ajusta según tu caso
            $table->decimal('capacidad_kg', 8, 2)->nullable();
            $table->string('placa_vehiculo')->unique();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
