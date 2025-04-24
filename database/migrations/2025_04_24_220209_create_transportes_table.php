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
        Schema::create('transportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('ordenes');
            $table->foreignId('user_id')->constrained('usuarios');
            $table->dateTime('fecha_asignacion');
            $table->enum('estado', ['programado', 'en_transito', 'entregado']);
            $table->decimal('costo_transporte', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportes');
    }
};
