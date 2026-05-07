<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;
use App\Models\BenefitCategory;
use App\Models\BenefitType;

class BenefitController extends Controller
{
    public function index(Request $request) 
    {
        // Iniciamos la consulta con sus relaciones
        $query = Benefit::with(['category', 'type']);

        // Filtro por BUSCADOR 
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function($q) use ($search) {
                $q->where('titulo', 'LIKE', "%{$search}%")
                ->orWhere('proveedor', 'LIKE', "%{$search}%")
                ->orWhere('subtitulo', 'LIKE', "%{$search}%");
            });
        }

        // Filtro por CATEGORÍA
        if ($request->filled('categoria')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('nombre', $request->categoria);
            });
        }

        // PAGINACIÓN
        $beneficios = $query->paginate(10)->withQueryString();

        // Traemos categorías ordenadas para tus botones del Navbar
        $categorias = BenefitCategory::orderBy('nombre')->get();

        return view('benefit.index', compact('beneficios', 'categorias'));
    }


    // ADMIN LISTA
    public function adminIndex()
    {
        $beneficios = Benefit::latest()->paginate(10);

        return view(
            'admin.beneficio.index',
            compact('beneficios')
        );
    }


    // ADMIN CREAR
    public function adminCreate()
    {
        $categories = BenefitCategory::all();

        $types = BenefitType::all();

        return view(
            'admin.beneficio.create',
            compact('categories','types')
        );
    }


    // ADMIN GUARDAR
    public function adminStore(Request $request)
    {

        $request->validate([

            'titulo' => 'required',
            'descripcion' => 'required',

        ]);

        Benefit::create($request->all());

        return redirect()
            ->route('admin.beneficio.index')
            ->with('success',
            'Beneficio creado correctamente');

    }


    // ADMIN EDITAR
    public function adminEdit($id)
    {
        $beneficio = Benefit::findOrFail($id);

        $categories = BenefitCategory::all();

        $types = BenefitType::all();

        return view(
            'admin.beneficio.edit',
            compact(
                'beneficio',
                'categories',
                'types'
            )
        );
    }


    // ADMIN ACTUALIZAR
    public function adminUpdate(Request $request,$id)
    {

        $beneficio =
            Benefit::findOrFail($id);

        $beneficio->update(
            $request->all()
        );

        return redirect()
            ->route('admin.beneficio.index')
            ->with('success',
            'Beneficio actualizado');

    }


    // ADMIN ELIMINAR
    public function adminDestroy($id)
    {

        $beneficio =
            Benefit::findOrFail($id);

        $beneficio->delete();

        return redirect()
            ->route('admin.beneficio.index')
            ->with('success',
            'Beneficio eliminado');

    }
}