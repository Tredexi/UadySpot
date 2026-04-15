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
            'email' => 'adrian@correo.uady.mx',
            'password' => bcrypt('admin123456'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Didier',
            'email' => 'didier@correo.uady.mx',
            'password' => bcrypt('user123456'),
            'is_admin' => false
        ]);

            User::create([
            'name' => 'Rafael',
            'email' => 'rafael@correo.uady.mx',
            'password' => bcrypt('admin123456'),
            'is_admin' => true
        ]);
    }
}
