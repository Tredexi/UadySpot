<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Benefit;
use App\Models\Trabajo;
use Illuminate\Support\Facades\DB;

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

        // DATOS PARA LA GRÁFICA
        $eventosPorMes = Evento::selectRaw('MONTH(fecha_calendario) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Convertimos a arrays
        $meses = $eventosPorMes->pluck('mes')->map(function ($mes) {
        return ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'][$mes - 1];});
        $totales = $eventosPorMes->pluck('total');

        return view('admin.dashboard', compact(
            'totalEventos',
            'totalBeneficios',
            'totalTrabajos',
            'eventos',
            'meses',     
            'totales'    
        ));
    }
}