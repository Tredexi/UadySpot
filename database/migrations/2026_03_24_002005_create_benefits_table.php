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
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('subtitulo');
            $table->string('imagen');
            $table->string('alt')->nullable();
            $table->string('valor'); // El "-25%" o "2x1"
            $table->string('proveedor');
            $table->string('ubicacion');
            $table->string('fecha_expiracion');
            $table->boolean('es_destacado')->default(false);
            
            // Relaciones (Llaves Foráneas)
            $table->foreignId('category_id')->constrained('benefit_categories')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('benefit_types')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits');
    }
};
