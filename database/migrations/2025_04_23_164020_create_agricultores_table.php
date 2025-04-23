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
            $table->id('agricultor_id'); 
            $table->boolean('certificacion_organ')->default(false);
            $table->unsignedTinyInteger('cantidad')->nullable();
            $table->decimal('ubicacion_lat', 10, 8);
            $table->decimal('ubicacion_lon', 11, 8);
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
