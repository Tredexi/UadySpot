<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Benefit;
use App\Models\BenefitCategory; 
use App\Models\BenefitType;

class BenefitSeeder extends Seeder
{
    public function run(): void
    {
        // ---CATEGORÍAS ---
        $categorias = [
            'Salud', 'Estilo de vida', 'Comida', 'Viajes', 'Educación', 'Entretenimiento'
        ];
        $catIds = [];
        foreach ($categorias as $cat) {
            $registro = BenefitCategory::create(['nombre' => $cat]);
            $catIds[$cat] = $registro->id;
        }

        // --- TIPOS DE BENEFICIO ---
        $tipos = ['Descuento', '2x1', 'Gratis', 'Cupón'];
        $tipoIds = [];
        foreach ($tipos as $t) {
            $registro = BenefitType::create(['nombre' => $t]);
            $tipoIds[$t] = $registro->id;
        }

        // --- DATOS DE LOS 18 BENEFICIOS ---
        $beneficiosData = [
            ['cat' => 'Salud', 'tipo' => 'Descuento', 'val' => '-25%', 'img' => 'imagenes/BeneficiosExclusivos/Gym.png', 'tit' => 'Membresía Mensual', 'sub' => 'Entrena con descuento exclusivo en área de pesas y cardio.', 'prov' => 'Gym Universitario', 'ubi' => 'Av. Tecnológico', 'dest' => true],
            ['cat' => 'Estilo de vida', 'tipo' => 'Descuento', 'val' => '-15%', 'img' => 'imagenes/BeneficiosExclusivos/BlackBarberia.png', 'tit' => 'Corte Premium', 'sub' => 'Incluye lavado, corte y perfilado de barba.', 'prov' => 'Barbería Black', 'ubi' => 'Plaza Altabrisa', 'dest' => true],
            ['cat' => 'Comida', 'tipo' => '2x1', 'val' => '2x1', 'img' => 'imagenes/BeneficiosExclusivos/ElPatioBar.png', 'tit' => 'Jueves de Hamburguesas', 'sub' => 'Compra una hamburguesa clásica y la segunda es gratis.', 'prov' => 'Restaurante El Patio', 'ubi' => 'Centro Histórico', 'dest' => true],
            ['cat' => 'Comida', 'tipo' => 'Descuento', 'val' => '-10%', 'img' => 'imagenes/BeneficiosExclusivos/StarbucksVaso.png', 'tit' => 'Upgrade de Tamaño', 'sub' => 'Paga tamaño Alto y llévate un Grande.', 'prov' => 'Starbucks', 'ubi' => 'Sucursales Norte', 'dest' => true],
            ['cat' => 'Viajes', 'tipo' => 'Descuento', 'val' => '-20%', 'img' => 'imagenes/BeneficiosExclusivos/AzulCenote.png', 'tit' => 'Acceso a Cenote', 'sub' => 'Escápate el fin de semana. Aplica para titular y 1 acompañante.', 'prov' => 'Parque Cenote Azul', 'ubi' => 'Ruta Cuzamá', 'dest' => true],
            ['cat' => 'Educación', 'tipo' => 'Gratis', 'val' => 'GRATIS', 'img' => 'imagenes/BeneficiosExclusivos/Software.png', 'tit' => 'Office 365 ProPlus', 'sub' => 'Word, Excel y PowerPoint gratis mientras seas estudiante.', 'prov' => 'Microsoft', 'ubi' => 'Online', 'dest' => false],
            ['cat' => 'Entretenimiento', 'tipo' => 'Descuento', 'val' => '-50%', 'img' => 'imagenes/BeneficiosExclusivos/Cine.png', 'tit' => 'Entrada de Cine VIP', 'sub' => 'Disfruta tus películas favoritas a mitad de precio.', 'prov' => 'Cinépolis', 'ubi' => 'Todas las sucursales', 'dest' => false],
            ['cat' => 'Estilo de vida', 'tipo' => 'Cupón', 'val' => '$100 MXN', 'img' => 'imagenes/BeneficiosExclusivos/Ropa.png', 'tit' => 'Bono en Ropa Deportiva', 'sub' => 'Descuento directo en compras mayores a $500 pesos.', 'prov' => 'Innovasport', 'ubi' => 'Plaza La Isla', 'dest' => false],
            ['cat' => 'Educación', 'tipo' => 'Descuento', 'val' => '-15%', 'img' => 'imagenes/BeneficiosExclusivos/Libreria.png', 'tit' => 'Libros y Textos', 'sub' => 'Descuento en material didáctico, literatura y cuadernos.', 'prov' => 'Librerías Gandhi', 'ubi' => 'Centro Histórico', 'dest' => false],
            ['cat' => 'Salud', 'tipo' => 'Gratis', 'val' => 'Consulta', 'img' => 'imagenes/BeneficiosExclusivos/Dentista.png', 'tit' => 'Limpieza Dental', 'sub' => 'Consulta de valoración y limpieza dental básica sin costo.', 'prov' => 'Clínica Dental UADY', 'ubi' => 'Campus Salud', 'dest' => false],
            ['cat' => 'Comida', 'tipo' => 'Cupón', 'val' => 'Postre', 'img' => 'imagenes/BeneficiosExclusivos/Pizza.png', 'tit' => 'Postre Gratis', 'sub' => 'En la compra de cualquier pizza grande, llévate unos canelazos.', 'prov' => 'Domino\'s Pizza', 'ubi' => 'App o Teléfono', 'dest' => false],
            ['cat' => 'Estilo de vida', 'tipo' => 'Descuento', 'val' => '-10%', 'img' => 'imagenes/BeneficiosExclusivos/Papeleria.png', 'tit' => 'Material para Maquetas', 'sub' => 'Ideal para estudiantes de Arquitectura e Ingeniería.', 'prov' => 'Lumen', 'ubi' => 'Paseo de Montejo', 'dest' => false],
            ['cat' => 'Entretenimiento', 'tipo' => '2x1', 'val' => '2x1', 'img' => 'imagenes/BeneficiosExclusivos/Museo.png', 'tit' => 'Entrada al Gran Museo', 'sub' => 'Paga una entrada y entra con un acompañante gratis.', 'prov' => 'Gran Museo Maya', 'ubi' => 'Carretera Progreso', 'dest' => false],
            ['cat' => 'Viajes', 'tipo' => 'Descuento', 'val' => '-15%', 'img' => 'imagenes/BeneficiosExclusivos/Autobus.png', 'tit' => 'Boletos Foráneos', 'sub' => 'Descuento adicional a la tarifa de estudiante.', 'prov' => 'Grupo ADO', 'ubi' => 'Terminal TAME', 'dest' => false],
            ['cat' => 'Educación', 'tipo' => 'Cupón', 'val' => '1 Mes', 'img' => 'imagenes/BeneficiosExclusivos/Cursos.png', 'tit' => 'Platzi Premium', 'sub' => 'Un mes de acceso completo a todos los cursos de tecnología.', 'prov' => 'Platzi', 'ubi' => 'Online', 'dest' => false],
            ['cat' => 'Salud', 'tipo' => 'Descuento', 'val' => '-30%', 'img' => 'imagenes/BeneficiosExclusivos/Lentes.png', 'tit' => 'Armazones y Micas', 'sub' => 'Renueva tus lentes con este descuento.', 'prov' => 'Ópticas Devlyn', 'ubi' => 'Centro y Plazas', 'dest' => false],
            ['cat' => 'Estilo de vida', 'tipo' => 'Gratis', 'val' => 'Envío', 'img' => 'imagenes/BeneficiosExclusivos/Delivery.png', 'tit' => 'Envíos Gratis', 'sub' => 'No pagues envío en tus pedidos de comida a la universidad.', 'prov' => 'Rappi', 'ubi' => 'App', 'dest' => false],
            ['cat' => 'Comida', 'tipo' => 'Descuento', 'val' => '-20%', 'img' => 'imagenes/BeneficiosExclusivos/Tacos.png', 'tit' => 'Orden de Tacos', 'sub' => 'Aplica en órdenes de pastor y bistec.', 'prov' => 'Taquería La Lupita', 'ubi' => 'Cerca de Fac. Ingeniería', 'dest' => false],
        ];

        // ---INSERTAR USANDO RELACIONES ---
        foreach ($beneficiosData as $data) {
            Benefit::create([
                'titulo' => $data['tit'],
                'subtitulo' => $data['sub'],
                'imagen' => $data['img'],
                'alt' => $data['tit'], // Usamos el título como alt por defecto
                'valor' => $data['val'],
                'proveedor' => $data['prov'],
                'ubicacion' => $data['ubi'],
                'fecha_expiracion' => '31/12/2026',
                'es_destacado' => $data['dest'],
                'category_id' => $catIds[$data['cat']], // Relación por ID
                'type_id' => $tipoIds[$data['tipo']]   // Relación por ID
            ]);
        }
    }
}