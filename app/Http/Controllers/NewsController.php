<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
      $datos = [
            'titulo_principal' => 'Noticias y Beneficios',
            'frase_bienvenida' => 'Mantente informado sobre las últimas noticias, convocatorias y beneficios disponibles para ti.',
            
            // Sección de Noticias (5 elementos con 10 propiedades cada uno)
            'noticias' => [
                [
                    'id'                => 1,
                    'categoria'         => 'Académico',
                    'titulo'            => 'Abre convocatoria para curso de preparación EGEL Plus',
                    'desc'              => 'Asegura tu titulación. Iniciamos inscripciones para el taller intensivo de preparación para el examen de egreso.',
                    'autor'             => 'Control Escolar',
                    'fecha'             => '17 Mar 2026',
                    'tiempo_lectura'    => '3 min de lectura',
                    'img'               => '/Imagenes/Noticias/egel_prep.png',
                    'etiqueta_especial' => 'Urgente',
                    'url'               => '/noticias/1'
                ],
                [
                    'id'                => 2,
                    'categoria'         => 'Tecnología',
                    'titulo'            => 'Hackathon UADY 2026: Retos en Desarrollo Web y AI',
                    'desc'              => 'Demuestra tus habilidades en Laravel, C# y automatización. Habrá premios en efectivo y hardware para los primeros lugares.',
                    'autor'             => 'Facultad de Matemáticas',
                    'fecha'             => '15 Mar 2026',
                    'tiempo_lectura'    => '5 min de lectura',
                    'img'               => '/Imagenes/Noticias/hackathon.png',
                    'etiqueta_especial' => 'Convocatoria',
                    'url'               => '/noticias/2'
                ],
                [
                    'id'                => 3,
                    'categoria'         => 'Deportes',
                    'titulo'            => 'Jaguares UADY dominan en el torneo interuniversitario',
                    'desc'              => 'El equipo representativo logró una victoria aplastante este fin de semana, asegurando su pase a las semifinales estatales.',
                    'autor'             => 'Deportes UADY',
                    'fecha'             => '14 Mar 2026',
                    'tiempo_lectura'    => '2 min de lectura',
                    'img'               => '/Imagenes/Noticias/deportes_jaguares.png',
                    'etiqueta_especial' => null,
                    'url'               => '/noticias/3'
                ],
                [
                    'id'                => 4,
                    'categoria'         => 'Infraestructura',
                    'titulo'            => 'Nuevos servidores y laboratorios para TI',
                    'desc'              => 'Se ha completado la actualización de los laboratorios de cómputo, incluyendo nuevas estaciones de trabajo y acceso mejorado a bases de datos.',
                    'autor'             => 'Rectoría',
                    'fecha'             => '10 Mar 2026',
                    'tiempo_lectura'    => '4 min de lectura',
                    'img'               => '/Imagenes/Noticias/labs_ti.png',
                    'etiqueta_especial' => 'Nuevo',
                    'url'               => '/noticias/4'
                ],
                [
                    'id'                => 5,
                    'categoria'         => 'Vida Universitaria',
                    'titulo'            => 'Lanzamiento oficial de la app UADY Spot',
                    'desc'              => 'Descubre cómo esta nueva plataforma revolucionará la forma en que los estudiantes acceden a beneficios, eventos y ofertas de trabajo.',
                    'autor'             => 'Comunidad Estudiantil',
                    'fecha'             => '08 Mar 2026',
                    'tiempo_lectura'    => '6 min de lectura',
                    'img'               => '/Imagenes/Noticias/uady_spot_launch.png',
                    'etiqueta_especial' => 'Destacado',
                    'url'               => '/noticias/5'
                ]
            ],

            // Sección de Beneficios rápidos
            'beneficios' => [
                [
                    'titulo' => 'Descuento en Cafetería', 
                    'desc' => '10% de descuento en todas tus compras presentando credencial.', 
                    'img' => '/Imagenes/BeneficiosExclusivos/StarbucksVaso.png'
                ],
                [
                    'titulo' => 'Licencias de Software', 
                    'desc' => 'Acceso gratuito a herramientas de desarrollo y ofimática.', 
                    'img' => '/Imagenes/BeneficiosExclusivos/software.png'
                ],
                [
                    'titulo' => 'Transporte Universitario', 
                    'desc' => 'Conoce las nuevas rutas exclusivas para estudiantes.', 
                    'img' => '/Imagenes/BeneficiosExclusivos/Autobus.png'
                ]
            ]
        ];

        return view('news.index', compact('datos'));
    }
}
