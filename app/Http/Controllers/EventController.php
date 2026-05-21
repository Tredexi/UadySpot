<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventController extends Controller
{

    public function index(Request $request)
    {

        $query = Evento::query();

        // FILTROS
        if ($request->filled('category')) {

            $query->where(
                'categoria',
                $request->category
            );

        }

        if ($request->filled('location')) {

            $query->where(
                'ubicacion',
                'like',
                '%' . $request->location . '%'
            );

        }

        if ($request->filled('status')) {

            $query->where(
                'disponibilidad_status',
                $request->status
            );

        }

        if ($request->filled('search')) {

            $query->where(
                'titulo',
                'like',
                '%' . $request->search . '%'
            );

        }

        // ESTE MES
        if ($request->date_range == 'this_month') {

            $query->whereMonth(
                'fecha_calendario',
                now()->month
            )->whereYear(
                'fecha_calendario',
                now()->year
            );

        }

        // PAGINACIÓN
        $events = $query
            ->paginate(8)
            ->withQueryString();

        return view(
            'event.index',
            compact('events')
        );

    }


    public function show($id)
    {

        $event = Evento::findOrFail($id);

        return view(
            'event.detail',
            compact('event')
        );

    }


    // =========================
    // ADMIN INDEX
    // =========================
    public function adminIndex()
    {

        $eventos = Evento::latest()
            ->paginate(8);

        return view(
            'admin.evento.index',
            compact('eventos')
        );

    }


    // =========================
    // ADMIN CREATE
    // =========================
    public function adminCreate()
    {

        return view(
            'admin.evento.create'
        );

    }


    // =========================
    // ADMIN STORE
    // =========================
    public function adminStore(Request $request)
    {

        $request->validate([

            'titulo' => 'required',
            'imagen' => 'required|image'

        ]);

        $imagenPath = null;

        // SUBIR IMAGEN
        if($request->hasFile('imagen')){

            $file = $request->file('imagen');

            $filename =
                time() . '_' .
                $file->getClientOriginalName();

            $destination =
                public_path('uploads/eventos');

            if(!file_exists($destination)){

                mkdir($destination, 0777, true);

            }

            $file->move(
                $destination,
                $filename
            );

            $imagenPath =
                'uploads/eventos/' . $filename;

        }

        // CREAR EVENTO
            Evento::create([

            'titulo' => $request->titulo,

            'categoria' => $request->categoria,

            'ubicacion' => $request->ubicacion,

            'fecha_calendario' => $request->fecha_calendario,

            'hora' => $request->hora,

            'descripcion' => $request->descripcion,

            'imagen' => $imagenPath

        ]);

        return redirect()
            ->route('admin.evento.index')
            ->with(
                'success',
                'Evento creado correctamente'
            );

    }


    // =========================
    // ADMIN EDIT
    // =========================
    public function adminEdit($id)
    {

        $evento = Evento::findOrFail($id);

        return view(
            'admin.evento.edit',
            compact('evento')
        );

    }


    // =========================
    // ADMIN UPDATE
    // =========================
    public function adminUpdate(
        Request $request,
        $id
    )
    {

        $evento = Evento::findOrFail($id);

        $imagenPath = $evento->imagen;

        // NUEVA IMAGEN
        if($request->hasFile('imagen')){

            $file = $request->file('imagen');

            $filename =
                time() . '_' .
                $file->getClientOriginalName();

            $destination =
                public_path('uploads/eventos');

            if(!file_exists($destination)){

                mkdir($destination, 0777, true);

            }

            $file->move(
                $destination,
                $filename
            );

            $imagenPath =
                'uploads/eventos/' . $filename;

        }

        $evento->update([

            'titulo' => $request->titulo,

            'categoria' => $request->categoria,

            'ubicacion' => $request->ubicacion,
                'hora' => $request->hora,


            'fecha_calendario' =>
                $request->fecha_calendario,

            'descripcion' =>
                $request->descripcion,

            'imagen' => $imagenPath

        ]);

        return redirect()
            ->route('admin.evento.index')
            ->with(
                'success',
                'Evento actualizado correctamente'
            );

    }


    // =========================
    // ADMIN DELETE
    // =========================
    public function adminDestroy($id)
    {

        $evento = Evento::findOrFail($id);

        $evento->delete();

        return redirect()
            ->route('admin.evento.index')
            ->with(
                'success',
                'Evento eliminado'
            );

    }


    // =========================
    // CALENDARIO
    // =========================
    public function calendario()
    {

        $eventos = Evento::all();

        return view(
            'calendario',
            compact('eventos')
        );

    }

}