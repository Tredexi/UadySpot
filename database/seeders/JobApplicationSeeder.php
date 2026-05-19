<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobApplication;

class JobApplicationSeeder extends Seeder
{
    public function run(): void
    {

        JobApplication::create([
            'user_id' => 1,
            'trabajo_id' => 1,
            'status' => 'En revisión'
        ]);

        JobApplication::create([
            'user_id' => 1,
            'trabajo_id' => 2,
            'status' => 'Entrevista'
        ]);

        JobApplication::create([
            'user_id' => 2,
            'trabajo_id' => 1,
            'status' => 'Aceptado'
        ]);

    }
}