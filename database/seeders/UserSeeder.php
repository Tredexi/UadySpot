<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Adrian',
            'email' => 'adrian@uadyspot.mx',
            'password' => bcrypt('admin123456'),

        ]);

        User::create([
            'name' => 'Didier',
            'email' => 'didier@correo.uady.mx',
            'password' => bcrypt('user123456'),

        ]);
                User::create([
            'name' => 'Alex',
            'email' => 'alex@correo.uady.mx',
            'password' => bcrypt('user123456'),

        ]);
                User::create([
            'name' => 'Miranda',
            'email' => 'miranda@correo.uady.mx',
            'password' => bcrypt('user123456'),

        ]);
                User::create([
            'name' => 'William',
            'email' => 'william@correo.uady.mx',
            'password' => bcrypt('user123456'),

        ]);

            User::create([
            'name' => 'Rafael',
            'email' => 'rafael@uadyspot.mx',
            'password' => bcrypt('admin123456'),

        ]);
    }
}
