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
        Schema::create('agricultores', function (Blueprint $table) {
            $table->id();
            $table->string('certificacion_organica');
            $table->integer('cantidad');
            $table->string('ubicacion_lat');
            $table->string('ubicacion_lon');
            $table->foreignId('tipo_id')->constrained('tipos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agricultores');
    }
};
