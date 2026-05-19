<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [

        'user_id',
        'phone',
        'career',
        'university',
        'semester',
        'skills',
        'experience',
        'education',
        'languages',
        'linkedin',
        'github',
        'portfolio',
        'cv_file'

    ];
    
       public function user()
    {
        return $this->belongsTo(User::class);
    }
}

