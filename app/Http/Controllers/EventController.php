<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento; // <--- Asegúrate de que esta línea esté aquí

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Evento::query();

        // Filtros dinámicos
        if ($request->filled('category')) {
            $query->where('categoria', $request->category);
        }

        if ($request->filled('location')) {
            $query->where('ubicacion', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('status')) {
            $query->where('disponibilidad_status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('titulo', 'like', '%' . $request->search . '%');
        }

        // Filtro de fecha (Este mes)
        if ($request->date_range == 'this_month') {
            $query->whereMonth('fecha_calendario', now()->month)
                ->whereYear('fecha_calendario', now()->year);
        }

        $events = $query->get(); // Trae los resultados de la BD

        return view('event.index', compact('events'));
    }

    public function show($id)
    {
        // Busca el evento o lanza un error 404 si no existe
        $event = Evento::findOrFail($id);

        return view('event.detail', compact('event'));
    }
}