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
        Schema::create('benefit_ratings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('benefit_id')
                  ->constrained()
                  ->onDelete('cascade');

            // calificación 1-5
            $table->tinyInteger('rating');

            $table->timestamps();

            // evita que el usuario califique varias veces
            $table->unique(['user_id', 'benefit_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('benefit_ratings');
    }
};
