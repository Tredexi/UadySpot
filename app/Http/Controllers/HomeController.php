<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento; // Asegúrate de que esta línea esté aquí

class HomeController extends Controller
{
    public function index() 
    {
        // 1. Traemos los eventos de la BASE DE DATOS
    
        $eventos = Evento::where('es_destacado', true)
                        ->take(4) 
                        ->get();

        // 2. Definimos los beneficios 
        $beneficios = [
            [
                'descuento' => '-25%',
                'imagen'    => '/imagenes/BeneficiosExclusivos/Gym.png',
                'alt'       => 'Gym Universitario',
                'titulo'    => 'Gym Universitario',
                'subtitulo' => 'Entrena con descuento exclusivo',
                'etiqueta'  => 'Solo Uady Spot'
            ],
            [
                'descuento' => '-15%',
                'imagen'    => '/imagenes/BeneficiosExclusivos/BlackBarberia.png',
                'alt'       => 'Barbería Black',
                'titulo'    => 'Barbería Black',
                'subtitulo' => 'Corte premium con descuento',
                'etiqueta'  => 'Convenio activo'
            ],
            [
                'descuento' => '2x1',
                'imagen'    => '/imagenes/BeneficiosExclusivos/ElPatioBar.png',
                'alt'       => 'Restaurante El Patio',
                'titulo'    => 'Restaurante El Patio',
                'subtitulo' => 'Comparte sin pagar de más',
                'etiqueta'  => 'Cupón limitado'
            ],
            [
                'descuento' => '-10%',
                'imagen'    => '/imagenes/BeneficiosExclusivos/StarbucksVaso.png',
                'alt'       => 'Starbucks',
                'titulo'    => 'Starbucks',
                'subtitulo' => 'Tu café con descuento diario',
                'etiqueta'  => 'Presentando app'
            ],
            [
                'descuento' => '-20%',
                'imagen'    => '/imagenes/BeneficiosExclusivos/AzulCenote.png',
                'alt'       => 'Cenote Azul',
                'titulo'    => 'Cenote Azul',
                'subtitulo' => 'Escápate el fin de semana',
                'etiqueta'  => 'Acceso exclusivo'
            ]
        ];

        // 3. UN SOLO RETURN al final con ambas variables
        return view('inicio', compact('eventos', 'beneficios'));
    }
}