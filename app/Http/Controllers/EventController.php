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
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500&h=300&fit=crop&q=80',
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
                'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=500&h=300&fit=crop&q=80',
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
                'image' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=500&h=300&fit=crop&q=80',
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
                'image' => 'https://images.unsplash.com/photo-1503437313881-503a91226402?w=500&h=300&fit=crop&q=80',
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
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500&h=300&fit=crop&q=80',
            ],
            [
                'id' => 6,
                'theme' => 'green',
                'category' => 'Deportes',
                'title' => 'OTRO EVENTO DE PRUEBA',
                'date_day' => '10',
                'date_month' => 'MAR',
                'location' => 'Estadio Central UADY',
                'time' => '2:00 PM',
                'availability' => 'Inscripción Cerrada',
                'availability_status' => 'closed',
                'action_text' => 'Ver detalles',
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500&h=300&fit=crop&q=80',
            ],
        ];

        return view('events.index', compact('events'));
    }
}
