<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\News;
use App\Models\Benefit;

class AdminController extends Controller
{

    public function dashboard()
    {

        $totalEventos = Evento::count();


        $totalBeneficios = Benefit::count();

        $eventos = Evento::latest()
                        ->take(5)
                        ->get();

        return view('admin.dashboard', compact(
            'totalEventos',
            'totalBeneficios',
            'eventos'
        ));

    }

}