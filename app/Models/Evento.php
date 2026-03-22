<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    // Esto le dice a Laravel qué campos puede guardar masivamente
    protected $fillable = [
        'titulo', 'imagen', 'categoria', 'ubicacion', 'hora', 
        'fecha_calendario', 'dia_texto', 'mes_texto', 
        'precio', 'disponibilidad', 'disponibilidad_status', 
        'texto_accion', 'es_destacado', 'campus', 'descripcion'
    ];
}
