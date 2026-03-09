<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        
        $eventsData = [
            [
                'id' => 1,
                'theme' => 'blue', 
                'category' => 'Talleres',
                'title' => 'TALLER DE INTRODUCCION A LA ROBÓTICA',
                'date_day' => '16',
                'date_month' => 'FEB',
                'calendar_date' => '2026-02-16',
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
                'calendar_date' => '2026-02-20',
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
                'calendar_date' => '2026-02-20',
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
                'calendar_date' => '2026-02-22',
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
                'calendar_date' => '2026-02-28',
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
                'calendar_date' => '2026-03-10',
                'location' => 'Estadio Central UADY',
                'time' => '2:00 PM',
                'availability' => 'Inscripción Cerrada',
                'availability_status' => 'closed',
                'action_text' => 'Ver detalles',
                'image' => 'Imagenes/Eventos_Imagenes/SemifinalBasquetbol.png',
            ],
        ];

        $events = collect($eventsData);

        if ($request->filled('category')) {
            $events = $events->where('category', $request->category);
        }
        if ($request->filled('location')) {
            $events = $events->filter(function ($event) use ($request) {
                return str_contains(strtolower($event['location']), strtolower($request->location));
            });
        }
        if ($request->filled('status')) {
            $events = $events->where('availability_status', $request->status);
        }
        if ($request->filled('date_range')) {
            if ($request->date_range == 'this_month') {
                $events = $events->filter(fn($e) => str_contains($e['calendar_date'], '2026-02'));
            }
        }
        return view('events.index', compact('events'));
    }



    public function show($id)
    {
        $events = collect($this->index(request())->getData()['events']);
        
        $event = $events->firstWhere('id', $id);

        if (!$event) {
            abort(404, 'Evento no encontrado');
        }

        return view('events.show', compact('event'));
    }
     // CALENDARIO
    public function calendario()
    {

        $events = $this->index()->getData()['events'];

        return view('calendario', compact('events'));
    }

}
