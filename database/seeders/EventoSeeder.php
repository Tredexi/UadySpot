<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    DB::table('eventos')->truncate(); 
        // 1. Taller de Robótica (Destacado)
        Evento::create([
            'titulo' => 'TALLER DE INTRODUCCION A LA ROBÓTICA',
            'imagen' => 'Imagenes/Eventos_Imagenes/Robotica.png',
            'categoria' => 'Talleres',
            'ubicacion' => 'Fac. de Ingeniería',
            'hora' => '9:00 AM',
            'fecha_calendario' => '2026-04-16',
            'dia_texto' => '16',
            'mes_texto' => 'ABR',
            'precio' => 130.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Ingeniería',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Aprende las bases de la robótica aplicada en este taller práctico diseñado para la comunidad UADY.'
        ]);

        // 2. Concierto Love Day (Destacado)
        Evento::create([
            'titulo' => 'CONCIERTO A LA LUZ DE LAS VELAS LOVE DAY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Concierto.png',
            'categoria' => 'Concierto',
            'ubicacion' => 'Auditorium Central',
            'hora' => '8:00 PM',
            'fecha_calendario' => '2026-05-22',
            'dia_texto' => '22',
            'mes_texto' => 'MAY',
            'precio' => 450.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Central',
            'descripcion' => 'Una velada romántica inolvidable con música de cámara en el corazón del edificio central.'
        ]);

        // 3. Liderazgo Estudiantil (Destacado)
        Evento::create([
            'titulo' => 'LIDERAZGO ESTUDIANTIL CON GUSTAVO SOLÍS',
            'imagen' => 'Imagenes/Eventos_Imagenes/LiderazgoEstudiantil.png',
            'categoria' => 'Conferencias',
            'ubicacion' => 'Fac. de Derecho',
            'hora' => '5:00 PM',
            'fecha_calendario' => '2026-05-20',
            'dia_texto' => '20',
            'mes_texto' => 'MAY',
            'precio' => 250.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Derecho',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Potencia tus habilidades blandas y de liderazgo con la charla magistral de Gustavo Solís.'
        ]);

        // 4. Exposición Universitaria (Destacado)
        Evento::create([
            'titulo' => 'EXPOSICIÓN: EXPRESIONES UNIVERSITARIAS',
            'imagen' => 'Imagenes/Eventos_Imagenes/Exposicion.png',
            'categoria' => 'Exposiciones',
            'ubicacion' => 'Galería Central UADY',
            'hora' => '10:00 AM',
            'fecha_calendario' => '2026-06-22',
            'dia_texto' => '22',
            'mes_texto' => 'JUN',
            'precio' => 150.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Central',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Descubre el talento artístico de los estudiantes de la universidad en esta muestra anual.'
        ]);

        // 5. Finales de Fútbol
        Evento::create([
            'titulo' => 'FINALES DE FÚTBOL INTERFACULTADES',
            'imagen' => 'Imagenes/Eventos_Imagenes/OcelotesVsJaguares.png',
            'categoria' => 'Deportes',
            'ubicacion' => 'Estadio Central UADY',
            'hora' => '3:00 PM',
            'fecha_calendario' => '2026-05-28',
            'dia_texto' => '28',
            'mes_texto' => 'MAY',
            'precio' => 150.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Central',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Ven a disfrutar las finales de los equipos de futbol interfacultades.'
        ]);

        // 6. Semifinales de Básquetbol
        Evento::create([
            'titulo' => 'SEMIFINALES DE BASQUETBOL INTERFACULTADES',
            'imagen' => 'Imagenes/Eventos_Imagenes/SemifinalBasquetbol.png',
            'categoria' => 'Deportes',
            'ubicacion' => 'Estadio Central UADY',
            'hora' => '2:00 PM',
            'fecha_calendario' => '2026-03-10',
            'dia_texto' => '10',
            'mes_texto' => 'MAR',
            'precio' => 120.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Central',
            'texto_accion' => 'Comprar',
            'descripcion' => 'Ven da disfrutar las semifinales de los equipos de basquetbol interfacultades.'
        ]);

                // 7. Hackathon UADY
        Evento::create([
            'titulo' => 'HACKATHON UADY 24H',
            'imagen' => 'Imagenes/Eventos_Imagenes/Hackathon.png',
            'categoria' => 'Conferencias',
            'ubicacion' => 'Fac. de Matemáticas',
            'hora' => '8:00 AM',
            'fecha_calendario' => '2026-07-15',
            'dia_texto' => '15',
            'mes_texto' => 'JUL',
            'precio' => 0.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Matemáticas',
            'texto_accion' => 'Participar',
            'descripcion' => 'Desarrolla soluciones innovadoras en 24 horas junto a otros estudiantes apasionados por la tecnología.'
        ]);

        // 8. Feria de Emprendimiento
        Evento::create([
            'titulo' => 'FERIA DE EMPRENDIMIENTO UADY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Emprendimiento.png',
            'categoria' => 'Comunidad',
            'ubicacion' => 'Centro de Convenciones',
            'hora' => '10:00 AM',
            'fecha_calendario' => '2026-03-18',
            'dia_texto' => '18',
            'mes_texto' => 'MAR',
            'precio' => 50.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Central',
            'texto_accion' => 'Asistir',
            'descripcion' => 'Conoce proyectos innovadores de estudiantes y emprendedores locales.'
        ]);

        // 9. Cine Universitario
        Evento::create([
            'titulo' => 'CINE UNIVERSITARIO: NOCHE DE CLÁSICOS',
            'imagen' => 'Imagenes/Eventos_Imagenes/Cine.png',
            'categoria' => 'Exposiciones',
            'ubicacion' => 'Auditorio Facultad de Ciencias Sociales',
            'hora' => '7:00 PM',
            'fecha_calendario' => '2026-05-20',
            'dia_texto' => '20',
            'mes_texto' => 'MAY',
            'precio' => 30.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Sociales',
            'texto_accion' => 'Reservar',
            'descripcion' => 'Disfruta una selección de películas clásicas en una noche cultural.'
        ]);

        // 10. Taller de Finanzas
        Evento::create([
            'titulo' => 'TALLER DE FINANZAS PERSONALES',
            'imagen' => 'Imagenes/Eventos_Imagenes/Finanzas.png',
            'categoria' => 'Talleres',
            'ubicacion' => 'Fac. de Contaduría',
            'hora' => '4:00 PM',
            'fecha_calendario' => '2026-05-22',
            'dia_texto' => '22',
            'mes_texto' => 'MAY',
            'precio' => 80.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Contaduría',
            'texto_accion' => 'Inscribirse',
            'descripcion' => 'Aprende a manejar tu dinero, ahorrar e invertir como estudiante.'
        ]);

        // 11. Torneo de eSports
        Evento::create([
            'titulo' => 'TORNEO DE ESPORTS UADY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Esports.png',
            'categoria' => 'Deportes',
            'ubicacion' => 'Centro de Cómputo',
            'hora' => '1:00 PM',
            'fecha_calendario' => '2026-03-25',
            'dia_texto' => '25',
            'mes_texto' => 'MAR',
            'precio' => 100.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Ingeniería',
            'texto_accion' => 'Competir',
            'descripcion' => 'Participa en torneos de videojuegos y demuestra tus habilidades.'
        ]);

        // 12. Jornada de Salud
        Evento::create([
            'titulo' => 'JORNADA DE SALUD UNIVERSITARIA',
            'imagen' => 'Imagenes/Eventos_Imagenes/Salud.png',
            'categoria' => 'Comunidad',
            'ubicacion' => 'Fac. de Medicina',
            'hora' => '9:00 AM',
            'fecha_calendario' => '2026-03-27',
            'dia_texto' => '27',
            'mes_texto' => 'MAR',
            'precio' => 0.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Medicina',
            'texto_accion' => 'Asistir',
            'descripcion' => 'Chequeos médicos gratuitos y orientación de salud para estudiantes.'
        ]);

        // 13. Networking Profesional
        Evento::create([
            'titulo' => 'NETWORKING PROFESIONAL UADY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Networking.png',
            'categoria' => 'Talleres',
            'ubicacion' => 'Centro Cultural Universitario',
            'hora' => '6:00 PM',
            'fecha_calendario' => '2026-03-30',
            'dia_texto' => '30',
            'mes_texto' => 'MAR',
            'precio' => 120.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Central',
            'texto_accion' => 'Conectar',
            'descripcion' => 'Conecta con empresas y profesionales del sector.'
        ]);

        // 14. Festival Cultural
        Evento::create([
            'titulo' => 'FESTIVAL CULTURAL UADY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Festival.png',
            'categoria' => 'Comunidad',
            'ubicacion' => 'Plaza Central',
            'hora' => '5:00 PM',
            'fecha_calendario' => '2026-04-02',
            'dia_texto' => '02',
            'mes_texto' => 'ABR',
            'precio' => 60.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Central',
            'texto_accion' => 'Disfrutar',
            'descripcion' => 'Música, danza y cultura en un solo evento universitario.'
        ]);

        // 15. Conferencia de IA
        Evento::create([
            'titulo' => 'CONFERENCIA DE INTELIGENCIA ARTIFICIAL',
            'imagen' => 'Imagenes/Eventos_Imagenes/IA.png',
            'categoria' => 'Conferencias',
            'ubicacion' => 'Fac. de Ingeniería',
            'hora' => '11:00 AM',
            'fecha_calendario' => '2026-04-05',
            'dia_texto' => '05',
            'mes_texto' => 'ABR',
            'precio' => 200.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Ingeniería',
            'texto_accion' => 'Reservar',
            'descripcion' => 'Descubre el futuro de la inteligencia artificial con expertos del área.'
        ]);

        // 16. Concurso de Innovación
        Evento::create([
            'titulo' => 'CONCURSO DE INNOVACIÓN UADY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Innovacion.png',
            'categoria' => 'Comunidad',
            'ubicacion' => 'Fac. de Ingeniería',
            'hora' => '9:00 AM',
            'fecha_calendario' => '2026-04-08',
            'dia_texto' => '08',
            'mes_texto' => 'ABR',
            'precio' => 0.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Ingeniería',
            'texto_accion' => 'Participar',
            'descripcion' => 'Presenta tu proyecto innovador y compite por premios.'
        ]);

        // 17. Taller de Ciberseguridad
        Evento::create([
            'titulo' => 'TALLER DE CIBERSEGURIDAD Y HACKING ÉTICO',
            'imagen' => 'Imagenes/Eventos_Imagenes/Ciberseguridad.png',
            'categoria' => 'Talleres',
            'ubicacion' => 'Fac. de Ingeniería',
            'hora' => '3:00 PM',
            'fecha_calendario' => '2026-04-12',
            'dia_texto' => '12',
            'mes_texto' => 'ABR',
            'precio' => 180.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Ingeniería',
            'texto_accion' => 'Inscribirse',
            'descripcion' => 'Aprende fundamentos de seguridad informática, pentesting y protección de redes.'
        ]);

        // 18. Torneo de Ajedrez
        Evento::create([
            'titulo' => 'TORNEO UNIVERSITARIO DE AJEDREZ',
            'imagen' => 'Imagenes/Eventos_Imagenes/Ajedrez.png',
            'categoria' => 'Deportes',
            'ubicacion' => 'Biblioteca Central',
            'hora' => '10:00 AM',
            'fecha_calendario' => '2026-04-15',
            'dia_texto' => '15',
            'mes_texto' => 'ABR',
            'precio' => 50.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Central',
            'texto_accion' => 'Competir',
            'descripcion' => 'Demuestra tu estrategia y participa en el torneo universitario de ajedrez.'
        ]);

        // 19. Feria de Idiomas
        Evento::create([
            'titulo' => 'FERIA DE IDIOMAS INTERNACIONAL',
            'imagen' => 'Imagenes/Eventos_Imagenes/Idiomas.png',
            'categoria' => 'Comunidad',
            'ubicacion' => 'Centro de Idiomas UADY',
            'hora' => '11:00 AM',
            'fecha_calendario' => '2026-04-18',
            'dia_texto' => '18',
            'mes_texto' => 'ABR',
            'precio' => 0.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Central',
            'texto_accion' => 'Asistir',
            'descripcion' => 'Descubre oportunidades académicas y culturales en distintos idiomas.'
        ]);

        // 20. Rally Deportivo
        Evento::create([
            'titulo' => 'RALLY DEPORTIVO INTERFACULTADES',
            'imagen' => 'Imagenes/Eventos_Imagenes/Rally.png',
            'categoria' => 'Deportes',
            'ubicacion' => 'Unidad Deportiva UADY',
            'hora' => '8:00 AM',
            'fecha_calendario' => '2026-04-20',
            'dia_texto' => '20',
            'mes_texto' => 'ABR',
            'precio' => 70.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => false,
            'campus' => 'Deportes',
            'texto_accion' => 'Participar',
            'descripcion' => 'Competencias físicas, retos grupales y mucha energía entre facultades.'
        ]);

        // 21. Workshop de Redes
        Evento::create([
            'titulo' => 'WORKSHOP DE REDES Y TELECOMUNICACIONES',
            'imagen' => 'Imagenes/Eventos_Imagenes/Redes.png',
            'categoria' => 'Conferencias',
            'ubicacion' => 'Fac. de Ingeniería',
            'hora' => '1:00 PM',
            'fecha_calendario' => '2026-04-22',
            'dia_texto' => '22',
            'mes_texto' => 'ABR',
            'precio' => 160.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Ingeniería',
            'texto_accion' => 'Reservar',
            'descripcion' => 'Conoce nuevas tendencias en redes, telecomunicaciones y conectividad empresarial.'
        ]);

        // 22. Festival Gamer
        Evento::create([
            'titulo' => 'FESTIVAL GAMER UADY',
            'imagen' => 'Imagenes/Eventos_Imagenes/Gamer.png',
            'categoria' => 'Comunidad',
            'ubicacion' => 'Centro de Convenciones',
            'hora' => '4:00 PM',
            'fecha_calendario' => '2026-04-25',
            'dia_texto' => '25',
            'mes_texto' => 'ABR',
            'precio' => 90.00,
            'disponibilidad' => 'Inscripción Abierta',
            'disponibilidad_status' => 'open',
            'es_destacado' => true,
            'campus' => 'Central',
            'texto_accion' => 'Entrar',
            'descripcion' => 'Torneos, cosplay, videojuegos y competencias para toda la comunidad universitaria.'
        ]);
    }
}