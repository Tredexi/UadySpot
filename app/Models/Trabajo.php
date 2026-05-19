<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $fillable = [

    'title',
    'company',
    'location',
    'salary',
    'type',
    'modality',
    'posted_at',
    'is_new',
    'urgent',
    'description'

    ];
    public function applications()
{
    return $this->hasMany(JobApplication::class);
}
public function favoritedBy()
{
    return $this->hasMany(FavoriteJob::class);
}
}
