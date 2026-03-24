<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EventoSeeder::class,   // Llena la tabla 'eventos'
            BenefitSeeder::class,  // Llena 'benefit_catagories', 'benefit_types' y 'benefits'
        ]);
    }
}