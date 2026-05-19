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
       Schema::create('resumes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('phone')->nullable();

            $table->string('career')->nullable();

            $table->string('university')->nullable();

            $table->string('semester')->nullable();

            $table->text('skills')->nullable();

            $table->text('experience')->nullable();

            $table->text('education')->nullable();

            $table->text('languages')->nullable();

            $table->string('linkedin')->nullable();

            $table->string('github')->nullable();

            $table->string('portfolio')->nullable();

            $table->string('cv_file')->nullable();

            $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
