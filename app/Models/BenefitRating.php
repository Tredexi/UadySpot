<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitRating extends Model
{
    protected $fillable = [
        'user_id',
        'benefit_id',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }
}
