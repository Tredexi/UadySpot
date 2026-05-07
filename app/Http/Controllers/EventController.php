<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

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

        // PAGINACIÓN
        $events = $query->paginate(10)->withQueryString();

        return view('event.index', compact('events'));
    }

    public function show($id)
    {
        // Busca el evento o lanza un error 404 si no existe
        $event = Evento::findOrFail($id);

        return view('event.detail', compact('event'));
    }

    // Métodos para la vistas de administación
    public function adminIndex()
    {

        $eventos = \App\Models\Evento::latest()
                        ->paginate(10);

        return view(
            'admin.evento.index',
            compact('eventos')
        );

    }

    public function adminCreate()
    {

        return view('admin.evento.create');

    }
    
    public function adminEdit($id)
    {

        $evento = \App\Models\Evento::findOrFail($id);

        return view(
            'admin.evento.edit',
            compact('evento')
        );

    }

    public function adminUpdate(Request $request, $id)
    {

        $evento = \App\Models\Evento::findOrFail($id);

        $evento->update([

            'titulo' => $request->titulo,
            'categoria' => $request->categoria,
            'ubicacion' => $request->ubicacion,
            'fecha_calendario' => $request->fecha_calendario,
            'descripcion' => $request->descripcion,

        ]);

        return redirect()
            ->route('admin.evento.index')
            ->with('success','Evento actualizado correctamente');

    }

    public function adminDestroy($id)
    {

        $evento = \App\Models\Evento::findOrFail($id);

        $evento->delete();

        return redirect()
            ->route('admin.evento.index')
            ->with('success','Evento eliminado');

    }

    public function adminStore(Request $request)
    {

        \App\Models\Evento::create([

            'titulo' => $request->titulo,
            'categoria' => $request->categoria,
            'ubicacion' => $request->ubicacion,
            'fecha_calendario' => $request->fecha_calendario,
            'descripcion' => $request->descripcion,

        ]);

        return redirect()
            ->route('admin.evento.index')
            ->with('success','Evento creado');

    }

    public function calendario()
    {
        $eventos = Evento::all(); // traer eventos reales

        return view('calendario', compact('eventos'));
    }

}