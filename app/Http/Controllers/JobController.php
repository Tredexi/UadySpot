<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $allJobs = [

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

            ],

            
    [
        'id' => 6,
        'title' => 'Desarrollador Frontend (React.js)',
        'company' => 'InnovaTech Solutions',
        'location' => 'Remoto',
        'salary' => '$20,000 - $30,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Remoto',
        'posted_at' => 'Hace 4 horas',
        'is_new' => true,
        'urgent' => false,
        'description' => 'Buscamos desarrollador Frontend con al menos 2 años de experiencia en React.js, Redux y consumo de APIs REST. Pasión por la creación de interfaces de usuario atractivas.',
    ],
    [
        'id' => 7,
        'title' => 'Ingeniero Backend (Node.js)',
        'company' => 'Fintech del Sureste',
        'location' => 'Campeche, Campeche',
        'salary' => '$30,000 - $40,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Híbrido',
        'posted_at' => 'Ayer',
        'is_new' => true,
        'urgent' => true,
        'description' => 'Únete a nuestro equipo core construyendo microservicios en Node.js y Express. Experiencia indispensable en bases de datos PostgreSQL y AWS.',
    ],
    [
        'id' => 8,
        'title' => 'Analista de Datos (SQL / Python)',
        'company' => 'Consultoría Estratégica MX',
        'location' => 'CDMX',
        'salary' => '$18,000 - $25,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Presencial',
        'posted_at' => 'Hace 2 días',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Responsable de la extracción, limpieza y visualización de datos utilizando SQL, Python (Pandas) y Power BI para la toma de decisiones directivas.',
    ],
    [
        'id' => 9,
        'title' => 'Diseñador UX/UI',
        'company' => 'Estudio Creativo Maya',
        'location' => 'Monterrey',
        'salary' => '$15,000 - $22,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Híbrido',
        'posted_at' => 'Hace 5 horas',
        'is_new' => true,
        'urgent' => false,
        'description' => 'Diseño de wireframes, prototipos y flujos de usuario en Figma. Se valorará portafolio que demuestre pensamiento centrado en el usuario y diseño responsivo.',
    ],
    [
        'id' => 10,
        'title' => 'Ingeniero DevOps',
        'company' => 'Cloud Masters',
        'location' => 'Remoto',
        'salary' => '$45,000 - $60,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Remoto',
        'posted_at' => 'Hace 3 días',
        'is_new' => false,
        'urgent' => true,
        'description' => 'Buscamos experto en CI/CD, Docker, Kubernetes y automatización de infraestructura con Terraform. Nivel de inglés avanzado es indispensable.',
    ],
    [
        'id' => 11,
        'title' => 'Desarrollador Móvil (Flutter)',
        'company' => 'Queretaro',
        'location' => 'Mérida, Yucatán',
        'salary' => '$25,000 - $35,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Presencial',
        'posted_at' => 'Hace 1 semana',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Creación y mantenimiento de aplicaciones para iOS y Android desde un solo código base usando Flutter y Dart. Integración con servicios de Firebase.',
    ],
    [
        'id' => 12,
        'title' => 'QA Tester Automation',
        'company' => 'Software Solutions',
        'location' => 'Remoto',
        'salary' => '$22,000 - $30,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Remoto',
        'posted_at' => 'Hace 4 días',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Diseño y ejecución de pruebas automatizadas utilizando Selenium, Cypress o Appium. Identificación y reporte de bugs en metodologías ágiles (Scrum).',
    ],
    [
        'id' => 13,
        'title' => 'Scrum Master',
        'company' => 'Corporativo Universitario',
        'location' => 'Quintanarro',
        'salary' => '$30,000 - $40,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Híbrido',
        'posted_at' => 'Hace 6 horas',
        'is_new' => true,
        'urgent' => false,
        'description' => 'Facilitador de ceremonias Scrum, eliminación de bloqueos y gestión de métricas ágiles. Certificación PSM I o CSM altamente deseable.',
    ],
    [
        'id' => 14,
        'title' => 'Especialista en Ciberseguridad',
        'company' => 'SecurIT Bank',
        'location' => 'Quintanarro',
        'salary' => '$40,000 - $55,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Presencial',
        'posted_at' => 'Hace 2 días',
        'is_new' => false,
        'urgent' => true,
        'description' => 'Monitoreo de alertas de seguridad, análisis de vulnerabilidades y pruebas de penetración (Pentesting). Conocimiento en normativas PCI-DSS.',
    ],
    [
        'id' => 15,
        'title' => 'Soporte Técnico Nivel 2',
        'company' => 'Tech Support Group',
        'location' => 'Chiapas',
        'salary' => '$10,000 - $13,000 MXN',
        'type' => 'Medio Tiempo',
        'modality' => 'Presencial',
        'posted_at' => 'Hace 1 día',
        'is_new' => true,
        'urgent' => false,
        'description' => 'Atención a tickets de escalamiento, configuración de correos corporativos, Active Directory y soporte remoto a usuarios finales.',
    ],
    [
        'id' => 16,
        'title' => 'Desarrollador WordPress Sr.',
        'company' => 'Agencia Digital',
        'location' => 'Remoto',
        'salary' => 'Por proyecto',
        'type' => 'Freelance',
        'modality' => 'Remoto',
        'posted_at' => 'Hace 1 semana',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Desarrollo de temas y plugins a la medida, optimización de velocidad (WPO) y seguridad en sitios de comercio electrónico con WooCommerce.',
    ],
    [
        'id' => 17,
        'title' => 'Administrador de Bases de Datos (DBA)',
        'company' => 'DataCore Services',
        'location' => 'Puebla',
        'salary' => '$35,000 - $45,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Híbrido',
        'posted_at' => 'Hace 3 días',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Mantenimiento, respaldo y afinación (tunning) de bases de datos Oracle y SQL Server. Monitoreo de rendimiento y planes de recuperación ante desastres.',
    ],
    [
        'id' => 18,
        'title' => 'Ingeniero de IA y Machine Learning',
        'company' => 'InnovaSoft',
        'location' => 'Remoto',
        'salary' => '$50,000 - $70,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Remoto',
        'posted_at' => 'Hace 12 horas',
        'is_new' => true,
        'urgent' => true,
        'description' => 'Entrenamiento de modelos LLM, procesamiento de lenguaje natural (NLP) y visión computacional utilizando TensorFlow o PyTorch.',
    ],
    [
        'id' => 19,
        'title' => 'Practicante de Diseño Gráfico/Web',
        'company' => 'Estudio Creativo Maya',
        'location' => 'Veracruz',
        'salary' => 'Apoyo económico ($5,000 MXN)',
        'type' => 'Prácticas',
        'modality' => 'Híbrido',
        'posted_at' => 'Hace 2 semanas',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Apoyo en la creación de banners, assets para redes sociales y maquetación básica en HTML/CSS. Estudiantes de últimos semestres.',
    ],
    [
        'id' => 20,
        'title' => 'Desarrollador Fullstack (MERN)',
        'company' => 'StartUp Hub',
        'location' => 'Remoto',
        'salary' => '$28,000 - $38,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Remoto',
        'posted_at' => 'Ayer',
        'is_new' => true,
        'urgent' => false,
        'description' => 'Desarrollo de punta a punta de aplicaciones SaaS utilizando MongoDB, Express, React y Node.js. Trabajo enfocado en cumplimiento de sprints.',
    ],
    [
        'id' => 21,
        'title' => 'Especialista SEO / SEM',
        'company' => 'Marketing Pro',
        'location' => 'Mérida, Yucatán',
        'salary' => '$16,000 - $20,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Híbrido',
        'posted_at' => 'Hace 5 días',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Optimización de posicionamiento orgánico, gestión de campañas en Google Ads, análisis de palabras clave y elaboración de reportes en Google Analytics.',
    ],
    [
        'id' => 22,
        'title' => 'Consultor SAP FI/CO',
        'company' => 'ERP Consultores',
        'location' => 'Remoto',
        'salary' => '$40,000 - $60,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Remoto',
        'posted_at' => 'Hace 1 semana',
        'is_new' => false,
        'urgent' => true,
        'description' => 'Implementación y soporte de los módulos Financiero y Controlling de SAP. Levantamiento de requerimientos y capacitación a usuarios clave.',
    ],
    [
        'id' => 23,
        'title' => 'Ingeniero de Redes (Cisco)',
        'company' => 'Telecomunicaciones del Sur',
        'location' => 'Oaxaca',
        'salary' => '$20,000 - $26,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Presencial',
        'posted_at' => 'Hace 3 horas',
        'is_new' => true,
        'urgent' => false,
        'description' => 'Configuración de switches, routers y firewalls Fortinet/Cisco. Monitoreo de tráfico, enlaces de microondas y resolución de incidencias de red.',
    ],
    [
        'id' => 24,
        'title' => 'Desarrollador iOS (Swift)',
        'company' => 'AppFactory',
        'location' => 'Remoto',
        'salary' => '$30,000 - $45,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Remoto',
        'posted_at' => 'Hace 2 días',
        'is_new' => false,
        'urgent' => false,
        'description' => 'Desarrollo nativo en Swift, patrones de diseño MVVM o VIPER, consumo de APIs y publicación de aplicaciones en la App Store.',
    ],
    [
        'id' => 25,
        'title' => 'Product Owner',
        'company' => 'Fintech del Sureste',
        'location' => 'Mérida, Yucatán',
        'salary' => '$40,000 - $55,000 MXN',
        'type' => 'Tiempo Completo',
        'modality' => 'Híbrido',
        'posted_at' => 'Hace 4 días',
        'is_new' => false,
        'urgent' => true,
        'description' => 'Definición del roadmap del producto, priorización del backlog y comunicación constante entre stakeholders y el equipo de desarrollo.',
    ]


        ];
        $jobs = collect($allJobs);

        // 1. Filtro por Palabra Clave (Título o Empresa)
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $jobs = $jobs->filter(function ($job) use ($search) {
                return str_contains(strtolower($job['title']), $search) || 
                       str_contains(strtolower($job['company']), $search);
            });
        }

        // 2. Filtro por Ubicación
        if ($request->filled('location')) {
            $loc = strtolower($request->location);
            $jobs = $jobs->filter(fn($job) => str_contains(strtolower($job['location']), $loc));
        }

        // 3. Filtro por Modalidad (Checkboxes)
        if ($request->filled('modality')) {
            $jobs = $jobs->whereIn('modality', $request->modality);
        }

        // 4. Filtro por Tipo de Empleo (Checkboxes)
        if ($request->filled('type')) {
            $jobs = $jobs->whereIn('type', $request->type);
        }

        return view('jobs.index', compact('jobs'));
    }
}