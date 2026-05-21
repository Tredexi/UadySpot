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
        //
           Schema::table('eventos', function (Blueprint $table) {

            $table->string('hora')
                ->nullable()
                ->change();

            $table->string('dia_texto')
                ->nullable()
                ->change();

            $table->string('mes_texto')
                ->nullable()
                ->change();

            $table->string('precio')
                ->nullable()
                ->change();

            $table->string('disponibilidad')
                ->nullable()
                ->change();

            $table->string('disponibilidad_status')
                ->nullable()
                ->change();

            $table->string('texto_accion')
                ->nullable()
                ->change();

            $table->string('ubicacion')
                ->nullable()
                ->change();

            $table->string('categoria')
                ->nullable()
                ->change();

            $table->text('descripcion')
                ->nullable()
                ->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
