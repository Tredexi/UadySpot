<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Taller de Robótica (Destacado para Inicio)
        Evento::create([
            'titulo' => 'TALLER DE INTRODUCCION A LA ROBÓTICA',
            'imagen' => 'Imagenes/Eventos_Imagenes/Robotica.png',
            'categoria' => 'Talleres',
            'ubicacion' => 'Fac. de Ingeniería',
            'hora' => '9:00 AM',
            'fecha_calendario' => '2026-02-16',
            'dia_texto' => '16',
            'mes_texto' => 'FEB',
            'precio' => 130,
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Ingeniería',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Aprende las bases de la robótica aplicada en este taller práctico diseñado para la comunidad UADY.'
        ]);

        // 2. Concierto Love Day (Destacado para Inicio)
        Evento::create([
            'titulo' => 'CONCIERTO A LA LUZ DE LAS VELAS LOVE DAY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Concierto.png',
            'categoria' => 'Concierto',
            'ubicacion' => 'Auditorium Central',
            'hora' => '8:00 PM',
            'fecha_calendario' => '2026-02-20',
            'dia_texto' => '20',
            'mes_texto' => 'FEB',
            'precio' => 450,
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Central',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Una velada romántica inolvidable con música de cámara en el corazón del edificio central.'
        ]);

        // 3. Liderazgo Estudiantil
        Evento::create([
            'titulo' => 'LIDERAZGO ESTUDIANTIL CON GUSTAVO SOLÍS',
            'imagen' => 'Imagenes/Eventos_Imagenes/LiderazgoEstudiantil.png',
            'categoria' => 'Conferencias',
            'ubicacion' => 'Fac. de Derecho',
            'hora' => '5:00 PM',
            'fecha_calendario' => '2026-02-20',
            'dia_texto' => '20',
            'mes_texto' => 'FEB',
            'precio' => 250,
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Derecho',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Potencia tus habilidades blandas y de liderazgo con la charla magistral de Gustavo Solís.'
        ]);

        // 4. Exposición Universitaria (Destacado para Inicio)
        Evento::create([
            'titulo' => 'EXPOSICIÓN: EXPRESIONES UNIVERSITARIAS',
            'imagen' => 'Imagenes/Eventos_Imagenes/Exposicion.png',
            'categoria' => 'Exposiciones',
            'ubicacion' => 'Galería Central UADY',
            'hora' => '10:00 AM',
            'fecha_calendario' => '2026-02-22',
            'dia_texto' => '22',
            'mes_texto' => 'FEB',
            'precio' => 150,
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Central',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Descubre el talento artístico de los estudiantes de la universidad en esta muestra anual.'
        ]);
    }
}