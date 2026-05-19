<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [

        'user_id',
        'trabajo_id',
        'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trabajo()
    {
        return $this->belongsTo(
            Trabajo::class,
            'trabajo_id'
        );
    }
}