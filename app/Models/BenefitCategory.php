<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitCategory extends Model
{
    protected $fillable = ['nombre'];

    public function benefits() {
        return $this->hasMany(Benefit::class, 'category_id');
    }
}

