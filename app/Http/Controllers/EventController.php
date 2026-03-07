<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        
        $events = [
            [
                'id' => 1,
                'theme' => 'blue', 
                'category' => 'Talleres',
                'title' => 'TALLER DE INTRODUCC... A LA ROBÓTICA',
                'date_day' => '16',
                'date_month' => 'FEB',
                'location' => 'Fac. de Ingeniería',
                'time' => '9:00 AM',
                'availability' => 'Inscripción Abierta',
                'availability_status' => 'open', 
                'action_text' => 'Registrarse',
                'image' => 'Imagenes/Eventos_Imagenes/Robotica.png',
            ],
            [
                'id' => 2,
                'theme' => 'pink',
                'category' => 'Conferencias',
                'title' => 'LIDERAZGO ESTUDIANTIL CON GUSTAVO SOLÍS',
                'date_day' => '20',
                'date_month' => 'FEB',
                'location' => 'Fac. de Derecho',
                'time' => '5:00 PM',
                'availability' => 'Inscripción Abierta',
                'availability_status' => 'open',
                'action_text' => 'Inscribirse',
                'image' => 'Imagenes/Eventos_Imagenes/LiderazgoEstudiantil.png',
            ],
            [
                'id' => 3,
                'theme' => 'blue', 
                'category' => 'Concierto',
                'title' => 'CONCIERTO A LA LUZ DE LAS VELAS LOVE DAY',
                'date_day' => '20',
                'date_month' => 'FEB',
                'location' => 'Auditorium Central',
                'time' => '8:00 PM',
                'tag_gallery' => 'Galería',
                'action_text' => 'Obtener boleto',
                'image' => 'Imagenes/Eventos_Imagenes/Concierto.png',
            ],
            [
                'id' => 4,
                'theme' => 'green',
                'category' => 'Exposiciones',
                'title' => 'EXPOSICIÓN: EXPRESIONES UNIVERSITARIAS',
                'date_day' => '22',
                'date_month' => 'FEB',
                'location' => 'Galería Central UADY',
                'time' => '10:00 AM',
                'availability' => 'Inscripción Abierta',
                'availability_status' => 'open',
                'action_text' => 'Ver detalles',
                'image' => 'Imagenes/Eventos_Imagenes/Exposicion.png',
            ],
            [
                'id' => 5,
                'theme' => 'green',
                'category' => 'Deportes',
                'title' => 'FINALES DE FÚTBOL INTERFACULTADES',
                'date_day' => '28',
                'date_month' => 'FEB',
                'location' => 'Estadio Central UADY',
                'time' => '3:00 PM',
                'availability' => 'Inscripción Abierta',
                'availability_status' => 'open',
                'action_text' => 'Ver detalles',
                'image' => 'Imagenes/Eventos_Imagenes/OcelotesVsJaguares.png',
            ],
            [
                'id' => 6,
                'theme' => 'green',
                'category' => 'Deportes',
                'title' => 'SEMIFINALES DE BASQUETBOL INTERFACULTADES',
                'date_day' => '10',
                'date_month' => 'MAR',
                'location' => 'Estadio Central UADY',
                'time' => '2:00 PM',
                'availability' => 'Inscripción Cerrada',
                'availability_status' => 'closed',
                'action_text' => 'Ver detalles',
                'image' => 'Imagenes/Eventos_Imagenes/SemifinalBasquetbol.png',
            ],
        ];

        return view('events.index', compact('events'));
    }
}
