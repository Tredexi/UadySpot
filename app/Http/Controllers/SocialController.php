<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index() {
        // Datos simulados (FeedData)
        $publicaciones = [
            [
                'id' => 1,
                'autor_nombre' => 'Carlos Pérez',
                'autor_rol' => 'Estudiante - LATI',
                'avatar' => 'https://ui-avatars.com/api/?name=Carlos+Perez&background=0D8ABC&color=fff',
                'tiempo' => 'Hace 2 horas',
                'texto' => '¡Por fin terminando los detalles del proyecto web en Laravel para este octavo semestre! Ha sido un reto pero ahí la llevamos. 💻🚀',
                'imagen' => '/Imagenes/laravel.png',
                'likes' => 24,
                'comentarios' => 5
            ],
            [
                'id' => 2,
                'autor_nombre' => 'Deportes UADY',
                'autor_rol' => 'Cuenta Oficial',
                'avatar' => 'https://ui-avatars.com/api/?name=Deportes+UADY&background=1D4ED8&color=fff',
                'tiempo' => 'Hace 4 horas',
                'texto' => '¡Apoya a nuestros Jaguares en el partido de este viernes! La entrada es libre con tu credencial de estudiante.',
                'imagen' => '/Imagenes/partido.png',
                'likes' => 112,
                'comentarios' => 18
            ],
            [
                'id' => 3,
                'autor_nombre' => 'Mtra. Elena Gómez',
                'autor_rol' => 'Docente - Redes y Seguridad',
                'avatar' => 'https://ui-avatars.com/api/?name=Elena+Gomez&background=9333EA&color=fff',
                'tiempo' => 'Hace 6 horas',
                'texto' => 'Chicos, ya están publicadas las calificaciones del segundo parcial en la plataforma institucional. Cualquier revisión la vemos el jueves en la UMA.',
                'imagen' => null,
                'likes' => 45,
                'comentarios' => 12
            ],
            [
                'id' => 4,
                'autor_nombre' => 'UADY Spot',
                'autor_rol' => 'Comunidad',
                'avatar' => 'https://ui-avatars.com/api/?name=UADY+Spot&background=F59E0B&color=fff',
                'tiempo' => 'Hace 8 horas',
                'texto' => '¿Ya probaron el nuevo menú de la cafetería de la facultad? Los chilaquiles están 10/10 hoy. 🤤',
                'imagen' => '/Imagenes/Cafeteria.png',
                'likes' => 89,
                'comentarios' => 34
            ],
            [
                'id' => 5,
                'autor_nombre' => 'Ana Laura Ruiz',
                'autor_rol' => 'Estudiante',
                'avatar' => 'https://ui-avatars.com/api/?name=Ana+Laura&background=EC4899&color=fff',
                'tiempo' => 'Ayer a las 14:30',
                'texto' => 'Alguien sabe si la biblioteca de la UMA está abierta hoy por la tarde? Necesito devolver unos libros de sistemas.',
                'imagen' => null,
                'likes' => 5,
                'comentarios' => 8
            ],
            [
                'id' => 6,
                'autor_nombre' => 'Sociedad de Alumnos',
                'autor_rol' => 'Organización Estudiantil',
                'avatar' => 'https://ui-avatars.com/api/?name=Sociedad+Alumnos&background=10B981&color=fff',
                'tiempo' => 'Ayer a las 10:00',
                'texto' => '¡No se pierdan nuestra próxima plática sobre tendencias en Inteligencia Artificial y metodologías ágiles en el auditorio principal!',
                'imagen' => '/Imagenes/inteligenciaArtificial.png',
                'likes' => 156,
                'comentarios' => 20
            ],
            [
                'id' => 7,
                'autor_nombre' => 'Miguel Canto',
                'autor_rol' => 'Estudiante - LATI',
                'avatar' => 'https://ui-avatars.com/api/?name=Miguel+Canto&background=3B82F6&color=fff',
                'tiempo' => 'Hace 2 días',
                'texto' => 'Buscando a dos integrantes para el proyecto final de Comercio Electrónico. Vamos a desarrollar una tienda con pasarela de pagos. Manden DM.',
                'imagen' => null,
                'likes' => 12,
                'comentarios' => 7
            ],
            [
                'id' => 8,
                'autor_nombre' => 'Control Escolar UADY',
                'autor_rol' => 'Administración',
                'avatar' => 'https://ui-avatars.com/api/?name=Control+Escolar&background=6B7280&color=fff',
                'tiempo' => 'Hace 2 días',
                'texto' => 'Recordatorio: El periodo para la carga de materias optativas comienza el próximo lunes. Revisen sus correos institucionales (@alumnos.uady.mx) para su turno asignado.',
                'imagen' => 'https://pddddicsum.photos/seed/uady/800/500',
                'likes' => 210,
                'comentarios' => 45
            ],
            [
                'id' => 9,
                'autor_nombre' => 'Emprendedores FCA',
                'autor_rol' => 'Comunidad',
                'avatar' => 'https://ui-avatars.com/api/?name=Emprendedores&background=F43F5E&color=fff',
                'tiempo' => 'Hace 3 días',
                'texto' => 'Gran éxito en el bazar de hoy. Gracias a todos los que apoyaron a los negocios locales y proyectos estudiantiles. ¡Nos vemos en la próxima edición!',
                'imagen' => 'https:dddd//picsum.photos/seed/bazar/800/500',
                'likes' => 78,
                'comentarios' => 3
            ],
            [
                'id' => 10,
                'autor_nombre' => 'Ing. Ricardo Méndez',
                'autor_rol' => 'Docente - Desarrollo Web',
                'avatar' => 'https://ui-avatars.com/api/?name=Ricardo+Mendez&background=14B8A6&color=fff',
                'tiempo' => 'Hace 4 días',
                'texto' => 'Les comparto un repositorio de GitHub muy útil con ejemplos de patrones de diseño en PHP. Revísenlo para sus próximos entregables.',
                'imagen' => null,
                'likes' => 54,
                'comentarios' => 6
            ]
        ];

        return view('social.index', compact('publicaciones'));
    }
}