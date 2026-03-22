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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            
            // Datos básicos que usas en tus tarjetas
            $table->string('titulo');
            $table->string('imagen'); 
            $table->string('categoria')->nullable();
            $table->string('ubicacion');
            $table->string('hora');
            
            // Fechas (esto nos servirá para ordenar por "más recientes")
            $table->date('fecha_calendario'); 
            $table->string('dia_texto'); // Ejemplo: '16'
            $table->string('mes_texto'); // Ejemplo: 'FEB'
            
            // Precios y Disponibilidad
            $table->decimal('precio', 8, 2)->default(0); 
            $table->string('disponibilidad')->default('Inscripción Abierta');
            $table->enum('disponibilidad_status', ['open', 'closed'])->default('open');
            $table->string('texto_accion')->default('Comprar');
            
            // Campos de Control para UADY SPOT
            $table->boolean('es_destacado')->default(false); // <--- ESTE ES EL QUE DICTA SI SALE EN INICIO
            $table->string('campus')->nullable(); // Para el filtro por facultad
            $table->text('descripcion')->nullable(); // Para la página de detalle
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};