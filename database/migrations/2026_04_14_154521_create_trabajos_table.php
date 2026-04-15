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
        Schema::create('trabajos', function (Blueprint $table) {
             $table->id();

            $table->string('title');

            $table->string('company');

            $table->string('location');

            $table->string('salary')->nullable();

            $table->string('type');

            $table->string('modality');

            $table->string('posted_at');

            $table->boolean('is_new')->default(false);

            $table->boolean('urgent')->default(false);

            $table->text('description');

            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajos');
    }
};
