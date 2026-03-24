<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;
use App\Models\BenefitCategory; // Para mostrar los botones de categorías

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

    // Obtenemos los beneficios finales
    $beneficios = $query->get();

    // Traemos categorías ordenadas para tus botones del Navbar
    $categorias = BenefitCategory::orderBy('nombre')->get();

    return view('benefit.index', compact('beneficios', 'categorias'));
}
}