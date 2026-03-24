<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable = [
    'titulo',
    'subtitulo',
    'imagen', 
    'valor', 
    'proveedor', 
    'ubicacion', 
    'fecha_expiracion',
    'es_destacado', 
    'category_id', 
    'type_id'
];

// Relaciones para poder hacer $benefit->category->nombre
public function category() {
    return $this->belongsTo(BenefitCategory::class, 'category_id');

}

public function type() {
    return $this->belongsTo(BenefitType::class, 'type_id');
}
}
