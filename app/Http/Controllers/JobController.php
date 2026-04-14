<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajo;

class JobController extends Controller
{
    public function index(Request $request)
    {

        // Iniciar consulta
        $query = Trabajo::query();

        // 1. Buscar por título o empresa
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('company', 'LIKE', "%{$search}%");

            });

        }

        // 2. Filtro ubicación
        if ($request->filled('location')) {

            $query->where(
                'location',
                'LIKE',
                "%{$request->location}%"
            );

        }

        // 3. Modalidad
        if ($request->filled('modality')) {

            $query->whereIn(
                'modality',
                $request->modality
            );

        }

        // 4. Tipo empleo
        if ($request->filled('type')) {

            $query->whereIn(
                'type',
                $request->type
            );

        }

        // Obtener resultados reales
        $jobs = $query->latest()->get();

        return view(
            'jobs.index',
            compact('jobs')
        );

    }




    // ADMIN LISTA
public function adminIndex()
{

    $trabajos =
        Trabajo::latest()->get();

    return view(
        'admin.trabajo.index',
        compact('trabajos')
    );

}


// ADMIN CREAR
public function adminCreate()
{

    return view(
        'admin.trabajo.create'
    );

}


// ADMIN GUARDAR
public function adminStore(Request $request)
{

    Trabajo::create(
        $request->all()
    );

    return redirect()
        ->route('admin.trabajo.index')
        ->with('success',
        'Trabajo creado');

}


// ADMIN EDITAR
public function adminEdit($id)
{

    $trabajo =
        Trabajo::findOrFail($id);

    return view(
        'admin.trabajo.edit',
        compact('trabajo')
    );

}


// ADMIN ACTUALIZAR
public function adminUpdate(Request $request,$id)
{

    $trabajo =
        Trabajo::findOrFail($id);

    $trabajo->update(
        $request->all()
    );

    return redirect()
        ->route('admin.trabajo.index')
        ->with('success',
        'Trabajo actualizado');

}


// ADMIN ELIMINAR
public function adminDestroy($id)
{

    $trabajo =
        Trabajo::findOrFail($id);

    $trabajo->delete();

    return redirect()
        ->route('admin.trabajo.index')
        ->with('success',
        'Trabajo eliminado');

}
}