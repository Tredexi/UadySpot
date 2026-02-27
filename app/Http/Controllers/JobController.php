<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // Datos de prueba simulando una consulta a la base de datos
        $jobs = [
            [
                'id' => 1,
                'title' => 'Administrador de Tecnologías de la Información',
                'company' => 'Corporativo Universitario',
                'location' => 'Mérida, Yucatán',
                'salary' => '$15,000 - $18,000 MXN',
                'type' => 'Tiempo Completo',
                'modality' => 'Presencial',
                'posted_at' => 'Hace 2 horas',
                'is_new' => true,
                'urgent' => false,
                'description' => 'Buscamos un perfil proactivo para administrar redes, servidores y dar soporte a sistemas internos. Deseable conocimiento en normativas de seguridad como ISO 27001.',
            ],
            [
                'id' => 2,
                'title' => 'Soporte Técnico IT - Sector Aeronáutico',
                'company' => 'Escuela de Aviación Mida',
                'location' => 'Mérida, Yucatán',
                'salary' => '$12,000 - $14,000 MXN',
                'type' => 'Tiempo Completo',
                'modality' => 'Presencial',
                'posted_at' => 'Hace 1 día',
                'is_new' => true,
                'urgent' => true,
                'description' => 'Únete a nuestro equipo dando soporte a equipos de cómputo, mantenimiento preventivo y correctivo, y gestión de redes en nuestras instalaciones.',
            ],
            [
                'id' => 3,
                'title' => 'Desarrollador C# / .NET MVC',
                'company' => 'Software Solutions',
                'location' => 'Remoto',
                'salary' => '$25,000 - $35,000 MXN',
                'type' => 'Tiempo Completo',
                'modality' => 'Remoto',
                'posted_at' => 'Hace 3 días',
                'is_new' => false,
                'urgent' => false,
                'description' => 'Desarrollo de aplicaciones web empresariales aplicando Clean Architecture, Entity Framework y metodologías ágiles. Experiencia comprobable en C#.',
            ],
            [
                'id' => 4,
                'title' => 'Especialista en Automatización (n8n & IA)',
                'company' => 'Agencia Digital',
                'location' => 'Mérida, Yucatán',
                'salary' => 'Por proyecto',
                'type' => 'Freelance',
                'modality' => 'Híbrido',
                'posted_at' => 'Hace 1 semana',
                'is_new' => false,
                'urgent' => false,
                'description' => 'Buscamos talento para diseñar flujos de trabajo con n8n, integración con APIs de WhatsApp y desarrollo de chatbots impulsados por IA.',
            ],
            [
                'id' => 5,
                'title' => 'Practicante de Desarrollo Web (PHP/Laravel)',
                'company' => 'Agencia Creativa',
                'location' => 'Mérida, Yucatán',
                'salary' => 'Apoyo económico ($4,000 MXN)',
                'type' => 'Prácticas',
                'modality' => 'Híbrido',
                'posted_at' => 'Hace 2 semanas',
                'is_new' => false,
                'urgent' => false,
                'description' => 'Aprende y desarrolla en proyectos reales utilizando Laravel, bases de datos relacionales y control de versiones con Git.',
            ]
        ];

        return view('jobs.index', compact('jobs'));
    }
}