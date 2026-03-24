<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Benefit;

class HomeController extends Controller
{
    public function index() 
    {
        // 1. Traemos los eventos de la BASE DE DATOS
    
        $eventos = Evento::where('es_destacado', true)
                        ->take(4) 
                        ->get();

        // 2. Definimos los beneficios 
        $beneficios = Benefit::with(['category', 'type'])
                        ->where('es_destacado', true)
                        ->get();
                        
        // 3. UN SOLO RETURN al final con ambas variables
        return view('inicio', compact('eventos', 'beneficios'));
    }
}