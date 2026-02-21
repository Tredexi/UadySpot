<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    $datos = [
        'titulo_principal' => 'UADY SPOT',
        'frase_bienvenida' => 'Gestiona tus tareas y eventos de forma eficiente.',
        
        // Sección de Noticias (Botón "Ver más")
        'noticias' => [
            ['titulo' => 'Nuevo Taller IT', 'desc' => 'Inscripciones abiertas.', 'img' => 'noticia1.jpg'],
            ['titulo' => 'Beca Pronabes', 'desc' => 'Consulta los resultados.', 'img' => 'noticia2.jpg'],
            
        ],

        // Sección E-commerce/Fiestas (Botón "Comprar")
        'eventos_venta' => [
            ['titulo' => 'Fiesta de Bienvenida', 'precio' => '$150.00', 'img' => 'fiesta.jpg'],
            ['titulo' => 'Congreso Nacional', 'precio' => '$500.00', 'img' => 'congreso.jpg'],
            ['titulo' => 'Evento San Valentin ', 'precio' => 'Gratis', 'img' => 'Sanvalentin.jpg'],
            
        ]
    ];

    return view('inicio', $datos);
}
}