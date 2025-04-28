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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('usuarios');
            $table->string('nombre');
            $table->enum('tipo', ['fruta', 'verdura', 'granos', 'otros']);
            $table->decimal('precio_por_kg', 10, 3);
            $table->decimal('cantidad_disponible', 10,);
            $table->date('fecha_cosecha');
            $table->text('descripcion')->nullable();
            $table->string('imagen_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
