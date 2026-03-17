<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
   // Simulando la consulta SQL (Ej. $eventos = Evento::all();)
        $eventos = [
            [
                'campus'   => 'Culturales',
                'imagen'   => 'imagenes/ProxEventos/filey2026.png',
                'etiqueta' => 'Recien agregado',
                'titulo'   => 'Filey 2026',
                'fechaI'   => '14',
                'fechaF'   => '22',
                'mes'      => 'Marzo',
                'anio'     => '2026',
                'costo'    => 'Entrada gratuita'
            ],
            [
                'campus'   => 'Academicos',
                'imagen'   => '/imagenes/ProxEventos/FeriaProfesiones.png',
                'etiqueta' => '',
                'titulo'   => 'Feria Universitaria de Profesiones 2026',
                'fechaI'   => '7',
                'fechaF'   => '12',
                'mes'      => 'Marzo',
                'anio'     => '2026',
                'costo'    => 'Entrada gratuita'
            ],
            [
                'campus'   => 'Deportivos',
                'imagen'   => '/imagenes/ProxEventos/CarreraUady.png',
                'etiqueta' => '',
                'titulo'   => 'Carrera UADY',
                'fechaI'   => '1',
                'fechaF'   => '',
                'mes'      => 'Marzo',
                'anio'     => '2026',
                'costo'    => '$50 MXN'
            ],
            [
                'campus'   => 'Culturales',
                'imagen'   => '/imagenes/ProxEventos/Beatles.png',
                'etiqueta' => '',
                'titulo'   => 'Tributo a The Beatles',
                'fechaI'   => '6',
                'fechaF'   => '',
                'mes'      => 'Abril',
                'anio'     => '2026',
                'costo'    => '$200 MXN'
            ]
        ];
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

        // Pasamos la variable a la vista usando compact()
        return view('inicio', compact('eventos','beneficios'));
    }
}