<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FavoriteJob;

class FavoriteJobSeeder extends Seeder
{
    public function run(): void
    {

        FavoriteJob::create([
            'user_id' => 1,
            'trabajo_id' => 1
        ]);

        FavoriteJob::create([
            'user_id' => 1,
            'trabajo_id' => 3
        ]);

        FavoriteJob::create([
            'user_id' => 2,
            'trabajo_id' => 2
        ]);

    }
}