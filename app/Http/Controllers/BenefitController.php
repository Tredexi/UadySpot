<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index(Request $request) 
    {
        $beneficiosData = [
            [
                'id' => 1,
                'categoria' => 'Salud',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-25%',
                'imagen' => 'imagenes/BeneficiosExclusivos/Gym.png',
                'alt' => 'Gym Universitario',
                'titulo' => 'Membresía Mensual',
                'subtitulo' => 'Entrena con descuento exclusivo en área de pesas y cardio.',
                'etiqueta' => 'Solo Uady Spot',
                'proveedor' => 'Gym Universitario',
                'ubicacion' => 'Av. Tecnológico',
                'fecha_expiracion' => '31/12/2026'
            ],
            [
                'id' => 2,
                'categoria' => 'Estilo de vida',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-15%',
                'imagen' => 'imagenes/BeneficiosExclusivos/BlackBarberia.png',
                'alt' => 'Barbería Black',
                'titulo' => 'Corte Premium',
                'subtitulo' => 'Incluye lavado, corte y perfilado de barba.',
                'etiqueta' => 'Convenio activo',
                'proveedor' => 'Barbería Black',
                'ubicacion' => 'Plaza Altabrisa',
                'fecha_expiracion' => '30/06/2026'
            ],
            [
                'id' => 3,
                'categoria' => 'Comida',
                'tipo_beneficio' => '2x1',
                'valor' => '2x1',
                'imagen' => 'imagenes/BeneficiosExclusivos/ElPatioBar.png',
                'alt' => 'Restaurante El Patio',
                'titulo' => 'Jueves de Hamburguesas',
                'subtitulo' => 'Compra una hamburguesa clásica y la segunda es gratis.',
                'etiqueta' => 'Cupón limitado',
                'proveedor' => 'Restaurante El Patio',
                'ubicacion' => 'Centro Histórico',
                'fecha_expiracion' => '01/05/2026'
            ],
            [
                'id' => 4,
                'categoria' => 'Comida',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-10%',
                'imagen' => 'imagenes/BeneficiosExclusivos/StarbucksVaso.png',
                'alt' => 'Starbucks',
                'titulo' => 'Upgrade de Tamaño',
                'subtitulo' => 'Paga tamaño Alto y llévate un Grande presentando tu app.',
                'etiqueta' => 'Presentando app',
                'proveedor' => 'Starbucks',
                'ubicacion' => 'Sucursales Norte',
                'fecha_expiracion' => '31/12/2026'
            ],
            [
                'id' => 5,
                'categoria' => 'Viajes',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-20%',
                'imagen' => 'imagenes/BeneficiosExclusivos/AzulCenote.png',
                'alt' => 'Cenote Azul',
                'titulo' => 'Acceso a Cenote',
                'subtitulo' => 'Escápate el fin de semana. Aplica para titular y 1 acompañante.',
                'etiqueta' => 'Acceso exclusivo',
                'proveedor' => 'Parque Cenote Azul',
                'ubicacion' => 'Ruta Cuzamá',
                'fecha_expiracion' => '15/08/2026'
            ],
            [
                'id' => 6,
                'categoria' => 'Educación',
                'tipo_beneficio' => 'Gratis',
                'valor' => 'GRATIS',
                'imagen' => 'imagenes/BeneficiosExclusivos/Software.png',
                'alt' => 'Licencia Office',
                'titulo' => 'Office 365 ProPlus',
                'subtitulo' => 'Word, Excel y PowerPoint gratis mientras seas estudiante.',
                'etiqueta' => 'Beneficio Institucional',
                'proveedor' => 'Microsoft',
                'ubicacion' => 'Online',
                'fecha_expiracion' => 'Vigente'
            ],
            [
                'id' => 7,
                'categoria' => 'Entretenimiento',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-50%',
                'imagen' => 'imagenes/BeneficiosExclusivos/Cine.png',
                'alt' => 'Cine',
                'titulo' => 'Entrada de Cine VIP',
                'subtitulo' => 'Disfruta tus películas favoritas a mitad de precio de lunes a jueves.',
                'etiqueta' => 'Uso semanal',
                'proveedor' => 'Cinépolis',
                'ubicacion' => 'Todas las sucursales',
                'fecha_expiracion' => '31/12/2026'
            ],
            [
                'id' => 8,
                'categoria' => 'Estilo de vida',
                'tipo_beneficio' => 'Cupón',
                'valor' => '$100 MXN',
                'imagen' => 'imagenes/BeneficiosExclusivos/Ropa.png',
                'alt' => 'Tienda Ropa',
                'titulo' => 'Bono en Ropa Deportiva',
                'subtitulo' => 'Descuento directo en compras mayores a $500 pesos.',
                'etiqueta' => 'Válido 1 vez',
                'proveedor' => 'Innovasport',
                'ubicacion' => 'Plaza La Isla',
                'fecha_expiracion' => '30/04/2026'
            ],
            [
                'id' => 9,
                'categoria' => 'Educación',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-15%',
                'imagen' => 'imagenes/BeneficiosExclusivos/Libreria.png',
                'alt' => 'Librería',
                'titulo' => 'Libros y Textos',
                'subtitulo' => 'Descuento en material didáctico, literatura y cuadernos.',
                'etiqueta' => 'Permanente',
                'proveedor' => 'Librerías Gandhi',
                'ubicacion' => 'Centro Histórico',
                'fecha_expiracion' => '31/12/2026'
            ],
            [
                'id' => 10,
                'categoria' => 'Salud',
                'tipo_beneficio' => 'Gratis',
                'valor' => 'Consulta',
                'imagen' => 'imagenes/BeneficiosExclusivos/Dentista.png',
                'alt' => 'Dentista',
                'titulo' => 'Limpieza Dental',
                'subtitulo' => 'Consulta de valoración y limpieza dental básica sin costo.',
                'etiqueta' => '1 por semestre',
                'proveedor' => 'Clínica Dental UADY',
                'ubicacion' => 'Campus Salud',
                'fecha_expiracion' => '31/07/2026'
            ],
            [
                'id' => 11,
                'categoria' => 'Comida',
                'tipo_beneficio' => 'Cupón',
                'valor' => 'Postre',
                'imagen' => 'imagenes/BeneficiosExclusivos/Pizza.png',
                'alt' => 'Pizzería',
                'titulo' => 'Postre Gratis',
                'subtitulo' => 'En la compra de cualquier pizza grande, llévate unos canelazos.',
                'etiqueta' => 'Solo a domicilio',
                'proveedor' => 'Domino\'s Pizza',
                'ubicacion' => 'App o Teléfono',
                'fecha_expiracion' => '15/06/2026'
            ],
            [
                'id' => 12,
                'categoria' => 'Estilo de vida',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-10%',
                'imagen' => 'imagenes/BeneficiosExclusivos/Papeleria.png',
                'alt' => 'Papelería',
                'titulo' => 'Material para Maquetas',
                'subtitulo' => 'Ideal para estudiantes de Arquitectura e Ingeniería.',
                'etiqueta' => 'Mostrando App',
                'proveedor' => 'Lumen',
                'ubicacion' => 'Paseo de Montejo',
                'fecha_expiracion' => '31/12/2026'
            ],
            [
                'id' => 13,
                'categoria' => 'Entretenimiento',
                'tipo_beneficio' => '2x1',
                'valor' => '2x1',
                'imagen' => 'imagenes/BeneficiosExclusivos/Museo.png',
                'alt' => 'Museo',
                'titulo' => 'Entrada al Gran Museo',
                'subtitulo' => 'Paga una entrada y entra con un acompañante gratis.',
                'etiqueta' => 'Fines de semana',
                'proveedor' => 'Gran Museo Maya',
                'ubicacion' => 'Carretera Progreso',
                'fecha_expiracion' => '31/12/2026'
            ],
            [
                'id' => 14,
                'categoria' => 'Viajes',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-15%',
                'imagen' => 'imagenes/BeneficiosExclusivos/Autobus.png',
                'alt' => 'Transporte ADO',
                'titulo' => 'Boletos Foráneos',
                'subtitulo' => 'Descuento adicional a la tarifa de estudiante en época vacacional.',
                'etiqueta' => 'Temporada Alta',
                'proveedor' => 'Grupo ADO',
                'ubicacion' => 'Terminal TAME',
                'fecha_expiracion' => '31/08/2026'
            ],
            [
                'id' => 15,
                'categoria' => 'Educación',
                'tipo_beneficio' => 'Cupón',
                'valor' => '1 Mes',
                'imagen' => 'imagenes/BeneficiosExclusivos/Cursos.png',
                'alt' => 'Plataforma de cursos',
                'titulo' => 'Platzi Premium',
                'subtitulo' => 'Un mes de acceso completo a todos los cursos de tecnología.',
                'etiqueta' => 'Nuevos usuarios',
                'proveedor' => 'Platzi',
                'ubicacion' => 'Online',
                'fecha_expiracion' => '01/05/2026'
            ],
            [
                'id' => 16,
                'categoria' => 'Salud',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-30%',
                'imagen' => 'imagenes/BeneficiosExclusivos/Lentes.png',
                'alt' => 'Óptica',
                'titulo' => 'Armazones y Micas',
                'subtitulo' => 'Renueva tus lentes con este descuento en armazones seleccionados.',
                'etiqueta' => 'Examen visual gratis',
                'proveedor' => 'Ópticas Devlyn',
                'ubicacion' => 'Centro y Plazas',
                'fecha_expiracion' => '30/09/2026'
            ],
            [
                'id' => 17,
                'categoria' => 'Estilo de vida',
                'tipo_beneficio' => 'Gratis',
                'valor' => 'Envío',
                'imagen' => 'imagenes/BeneficiosExclusivos/Delivery.png',
                'alt' => 'Delivery',
                'titulo' => 'Envíos Gratis',
                'subtitulo' => 'No pagues envío en tus pedidos de comida a la universidad.',
                'etiqueta' => 'Pedidos > $150',
                'proveedor' => 'Rappi',
                'ubicacion' => 'App',
                'fecha_expiracion' => '31/10/2026'
            ],
            [
                'id' => 18,
                'categoria' => 'Comida',
                'tipo_beneficio' => 'Descuento',
                'valor' => '-20%',
                'imagen' => 'imagenes/BeneficiosExclusivos/Tacos.png',
                'alt' => 'Taquería',
                'titulo' => 'Orden de Tacos',
                'subtitulo' => 'Aplica en órdenes de pastor y bistec de lunes a miércoles.',
                'etiqueta' => 'Antojo nocturno',
                'proveedor' => 'Taquería La Lupita',
                'ubicacion' => 'Cerca de Fac. Ingeniería',
                'fecha_expiracion' => '31/12/2026'
            ]
        ];

        $beneficios = collect($beneficiosData);

        if ($request->filled('categoria')) {
            $beneficios = $beneficios->where('categoria', $request->categoria);
        }

        return view('benefit.index', compact('beneficios'));
    }
}