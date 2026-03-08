<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{

    public function index()
    {

        $carreras = [

            "Campus de Arquitectura, Hábitat, Arte y Diseño" => [
                "Licenciatura en Arquitectura",
                "Licenciatura en Diseño de Hábitat",
                "Licenciatura en Artes Visuales"
            ],

            "Campus de Ciencias de la Salud" => [
                "Licenciatura en Cirujano Dentista",
                "Licenciatura en Trabajo Social",
                "Licenciatura en Médico Cirujano",
                "Licenciatura en Nutrición",
                "Licenciatura en Rehabilitación",
                "Licenciatura en Químico Farmacéutico Biólogo",
                "Licenciatura Institucional en Química Aplicada",
                "Licenciatura en Enfermería"
            ],

            "Campus de Ciencias Biológicas y Agropecuarias" => [
                "Licenciatura en Biología",
                "Licenciatura en Agroecología",
                "Licenciatura en Biología Marina",
                "Licenciatura en Medicina Veterinaria y Zootecnia"
            ],

            "Campus de Ciencias Exactas e Ingenierías" => [
                "Licenciatura en Matemáticas",
                "Licenciatura Institucional en Química Aplicada",
                "Ingeniería Industrial Logística",
                "Ingeniería en Alimentos",
                "Ingeniería en Biotecnología",
                "Ingeniería Civil",
                "Ingeniería Física",
                "Ingeniería en Mecatrónica",
                "Ingeniería en Energías Renovables",
                "Actuaría",
                "Enseñanza de las Matemáticas",
                "Ingeniería en Computación",
                "Ingeniería de Software",
                "Ciencias de la Computación",
                "Ingeniería en Química Industrial"
            ],

            "Campus de Ciencias Sociales, Económico Administrativas y Humanidades" => [
                "Antropología Social",
                "Arqueología",
                "Comunicación Social",
                "Historia",
                "Literatura Latinoamericana",
                "Turismo",
                "Contador Público",
                "Mercadotecnia y Negocios Internacionales",
                "Administración de Tecnologías de la Información",
                "Administración",
                "Enseñanza del Idioma Inglés",
                "Derecho",
                "Economía",
                "Comercio Internacional",
                "Psicología",
                "Educación"
            ],

            "Unidad Multidisciplinaria de Tizimín" => [
                "Enfermería",
                "Educación",
                "Contador Público",
                "Ingeniería de Software"
            ],

            "Modalidad Virtual" => [
                "Gestión Pública",
                "Educación",
                "Ciencias Políticas",
                "Derecho",
                "Ingeniería de Software"
            ]

        ];

        return view('careers.index', compact('carreras'));
    }

}