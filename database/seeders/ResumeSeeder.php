<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resume;

class ResumeSeeder extends Seeder
{
    public function run(): void
    {

        Resume::create([

            'user_id' => 1,

            'phone' => '9991112233',

            'career' => 'Ingeniería de Software',

            'university' => 'UADY',

            'semester' => '8vo semestre',

            'skills' => 'Laravel, PHP, MySQL, Bootstrap, JavaScript',

            'experience' => 'Desarrollo de plataforma UADY Spot y sistemas administrativos.',

            'education' => 'Universidad Autónoma de Yucatán',

            'languages' => 'Español, Inglés',

            'cv_file' => null

        ]);



        Resume::create([

            'user_id' => 2,

            'phone' => '9992223344',

            'career' => 'Diseño Multimedia',

            'university' => 'UADY',

            'semester' => '6to semestre',

            'skills' => 'Figma, Photoshop, Illustrator',

            'experience' => 'Diseño UI/UX y branding.',

            'education' => 'Universidad Autónoma de Yucatán',

            'languages' => 'Español',

            'cv_file' => null

        ]);



        Resume::create([

            'user_id' => 3,

            'phone' => '9993334455',

            'career' => 'Ingeniería en Computación',

            'university' => 'UADY',

            'semester' => '9no semestre',

            'skills' => 'Python, IA, Redes, Linux',

            'experience' => 'Automatización y análisis de datos.',

            'education' => 'Universidad Autónoma de Yucatán',

            'languages' => 'Español, Inglés',

            'cv_file' => null

        ]);

    }
}