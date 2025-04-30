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
        Schema::create('empleos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('usuarios');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('tipo_trabajo');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('pago_por_dia');
            $table->foreignId('estado_id')->constrained('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleos');
    }
};
