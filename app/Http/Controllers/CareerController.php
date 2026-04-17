<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{

public function index()
{
    $carreras = [

        "Campus de Arquitectura, Hábitat, Arte y Diseño" => [
            ["nombre" => "Licenciatura en Arquitectura", "url" => "http://www.arquitectura.uady.mx/licarquitectura.php"],
            ["nombre" => "Licenciatura en Diseño de Hábitat", "url" => "http://www.arquitectura.uady.mx/licdh.php"],
            ["nombre" => "Licenciatura en Artes Visuales", "url" => "http://www.arquitectura.uady.mx/licartes.php"]
        ],

        "Campus de Ciencias de la Salud" => [
            ["nombre" => "Licenciatura en Cirujano Dentista", "url" => "https://www.odontologia.uady.mx/programas-academicos/licenciatura/"],
            ["nombre" => "Licenciatura en Trabajo Social", "url" => "https://enfermeria.uady.mx/enf-oferta-educativa/licenciatura"],
            ["nombre" => "Licenciatura en Médico Cirujano", "url" => "http://www.medicina.uady.mx/principal/m01medicina.php"],
            ["nombre" => "Licenciatura en Nutrición", "url" => "http://www.medicina.uady.mx/principal/m01nutricion.php"],
            ["nombre" => "Licenciatura en Rehabilitación", "url" => "http://www.medicina.uady.mx/principal/m01rehabilitacion.php"],
            ["nombre" => "Licenciatura en Químico Farmacéutico Biólogo", "url" => "http://www.quimica.uady.mx/"],
            ["nombre" => "Licenciatura Institucional en Química Aplicada", "url" => "http://www.quimica.uady.mx/"],
            ["nombre" => "Licenciatura en Enfermería", "url" => "https://enfermeria.uady.mx/enf-oferta-educativa/licenciatura"]
        ],

        "Campus de Ciencias Biológicas y Agropecuarias" => [
            ["nombre" => "Licenciatura en Biología", "url" => "https://ccba.uady.mx/mvz-oferta-educativa/mvz-licenciaturas"],
            ["nombre" => "Licenciatura en Agroecología", "url" => "https://ccba.uady.mx/mvz-oferta-educativa/mvz-licenciaturas"],
            ["nombre" => "Licenciatura en Biología Marina", "url" => "https://ccba.uady.mx/mvz-oferta-educativa/mvz-licenciaturas"],
            ["nombre" => "Licenciatura en Medicina Veterinaria y Zootecnia", "url" => "https://ccba.uady.mx/mvz-oferta-educativa/mvz-licenciaturas"]
        ],

        "Campus de Ciencias Exactas e Ingenierías" => [
            ["nombre" => "Licenciatura en Matemáticas", "url" => "https://matematicas.uady.mx/fmat-oferta-educativa/licenciatura-en-matematicas"],
            ["nombre" => "Licenciatura Institucional en Química Aplicada", "url" => "http://www.quimicaaplicada.uady.mx/"],
            ["nombre" => "Ingeniería Industrial Logística", "url" => "http://www.ingquimica.uady.mx/iil/"],
            ["nombre" => "Ingeniería en Alimentos", "url" => "http://www.ingquimica.uady.mx/ia/"],
            ["nombre" => "Ingeniería en Biotecnología", "url" => "http://www.ingquimica.uady.mx/ib/"],
            ["nombre" => "Ingeniería Civil", "url" => "https://ingenieria.uady.mx/fing-oferta-educativa/lic_ing_civil"],
            ["nombre" => "Ingeniería Física", "url" => "https://ingenieria.uady.mx/fing-oferta-educativa/lic_ing_fisica"],
            ["nombre" => "Ingeniería en Mecatrónica", "url" => "https://ingenieria.uady.mx/fing-oferta-educativa/lic_ing_mecatronica"],
            ["nombre" => "Ingeniería en Energías Renovables", "url" => "https://ingenieria.uady.mx/fing-oferta-educativa/lic_ing_renovables"],
            ["nombre" => "Actuaría", "url" => "https://matematicas.uady.mx/fmat-oferta-educativa/licenciatura-en-actuaria"],
            ["nombre" => "Enseñanza de las Matemáticas", "url" => "https://matematicas.uady.mx/fmat-oferta-educativa/licenciatura-en-ensenanza-de-las-matematicas"],
            ["nombre" => "Ingeniería en Computación", "url" => "https://matematicas.uady.mx/fmat-oferta-educativa/licenciatura-en-ingenieria-en-computacion"],
            ["nombre" => "Ingeniería de Software", "url" => "https://matematicas.uady.mx/fmat-oferta-educativa/licenciatura-en-ingenieria-de-software"],
            ["nombre" => "Ciencias de la Computación", "url" => "https://matematicas.uady.mx/fmat-oferta-educativa/licenciatura-en-ciencias-de-la-computacion"],
            ["nombre" => "Ingeniería en Química Industrial", "url" => "https://www.ingquimica.uady.mx/iqi/"]
        ],

        "Campus de Ciencias Sociales, Económico Administrativas y Humanidades" => [
            ["nombre" => "Antropología Social", "url" => "https://antropologia.uady.mx/antro-oferta-educativa/antropologia-social"],
            ["nombre" => "Arqueología", "url" => "https://antropologia.uady.mx/antro-oferta-educativa/arqueologia"],
            ["nombre" => "Comunicación Social", "url" => "https://antropologia.uady.mx/antro-oferta-educativa/comunicacion-social"],
            ["nombre" => "Historia", "url" => "https://antropologia.uady.mx/antro-oferta-educativa/historia"],
            ["nombre" => "Literatura Latinoamericana", "url" => "https://antropologia.uady.mx/antro-oferta-educativa/literatura-latinoamericana"],
            ["nombre" => "Turismo", "url" => "https://antropologia.uady.mx/antro-oferta-educativa/turismo"],
            ["nombre" => "Contador Público", "url" => "https://contaduria.uady.mx/fca-oferta-educativa/programas-de-licenciatura"],
            ["nombre" => "Mercadotecnia y Negocios Internacionales", "url" => "https://contaduria.uady.mx/fca-oferta-educativa/programas-de-licenciatura"],
            ["nombre" => "Administración de Tecnologías de la Información", "url" => "https://contaduria.uady.mx/fca-oferta-educativa/programas-de-licenciatura"],
            ["nombre" => "Administración", "url" => "https://contaduria.uady.mx/fca-oferta-educativa/programas-de-licenciatura"],
            ["nombre" => "Enseñanza del Idioma Inglés", "url" => "https://uady.mx/ofertaeducativa/idiomas"],
            ["nombre" => "Derecho", "url" => "https://derecho.uady.mx"],
            ["nombre" => "Economía", "url" => "https://economia.uady.mx/eco-oferta-educativa/Licenciaturas"],
            ["nombre" => "Comercio Internacional", "url" => "https://economia.uady.mx/eco-oferta-educativa/Licenciaturas"],
            ["nombre" => "Psicología", "url" => "https://psicologia.uady.mx"],
            ["nombre" => "Educación", "url" => "https://educacion.uady.mx"]
        ],

        "Unidad Multidisciplinaria de Tizimín" => [
            ["nombre" => "Enfermería", "url" => "http://www.tizimin.uady.mx/lic/lenf.php?mnu=1"],
            ["nombre" => "Educación", "url" => "https://www.tizimin.uady.mx/lic/le.php?mnu=1"],
            ["nombre" => "Contador Público", "url" => "https://www.tizimin.uady.mx/lic/lcont.php?mnu=1"],
            ["nombre" => "Ingeniería de Software", "url" => "https://www.tizimin.uady.mx/lic/lis.php?mnu=1"]
        ],

        "Modalidad Virtual" => [
            ["nombre" => "Gestión Pública", "url" => "https://uaev.uady.mx/UAEV-LV/UAEV-LV-LGP"],
            ["nombre" => "Educación", "url" => "https://uaev.uady.mx/#/UAEV-LV"],
            ["nombre" => "Ciencias Políticas", "url" => "https://uaev.uady.mx/UAEV-LV/UAEV-LV-LCP"],
            ["nombre" => "Derecho", "url" => "https://derecho.uady.mx/der-oferta-educativa/licenciatura-virtual"],
            ["nombre" => "Ingeniería de Software", "url" => "https://matematicas.uady.mx/fmat-oferta-educativa/licenciatura-en-ingenieria-de-software-modalidad-virtual"]
        ]

    ];

    return view('careers.index', compact('carreras'));
}

}