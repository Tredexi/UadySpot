<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $datos = [
            'titulo_principal' => 'Noticias y Beneficios',
            'frase_bienvenida' => 'Mantente informado sobre las últimas noticias y beneficios disponibles para ti.',
            
            // Sección de Noticias (Botón "Ver más")
            'noticias' => [
                ['titulo' => 'Nuevo Taller IT', 'desc' => 'Inscripciones abiertas.', 'img' => 'noticia1.jpg'],
                ['titulo' => 'Beca Pronabes', 'desc' => 'Consulta los resultados.', 'img' => 'noticia2.jpg'],
                
            ],

            // Sección de Beneficios (Botón "Ver más")
            'beneficios' => [
                ['titulo' => 'Descuento en Cafetería', 'desc' => '10% de descuento en todas tus compras.', 'img' => 'beneficio1.jpg'],
                ['titulo' => 'Acceso a Biblioteca', 'desc' => 'Acceso gratuito a la biblioteca digital.', 'img' => 'beneficio2.jpg'],
                
            ]
        ];

        return view('news.index', $datos);
    }
}
