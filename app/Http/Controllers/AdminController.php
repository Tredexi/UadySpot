<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\News;
use App\Models\Benefit;
use App\Models\Trabajo;

class AdminController extends Controller
{

    public function dashboard()
    {

        $totalEventos = Evento::count();
        $totalTrabajos = Trabajo::count();

        $totalBeneficios = Benefit::count();

        $eventos = Evento::latest()
                        ->take(5)
                        ->get();

        return view('admin.dashboard', compact(
            'totalEventos',
            'totalBeneficios',
            'totalTrabajos',
            'eventos'
        ));

    }

}