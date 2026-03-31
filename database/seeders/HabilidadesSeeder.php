<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabilidadesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('habilidades')->insert([
            ['nombre' => 'Limpieza de casa'],
            ['nombre' => 'Cocina'],
            ['nombre' => 'Cuidado de niños'],
            ['nombre' => 'Cuidado de adultos mayores'],
            ['nombre' => 'Reparto / Delivery'],
            ['nombre' => 'Mensajería'],
            ['nombre' => 'Jardinería'],
            ['nombre' => 'Reparación eléctrica básica'],
            ['nombre' => 'Plomería básica'],
            ['nombre' => 'Carpintería básica'],
            ['nombre' => 'Lavado de autos'],
            ['nombre' => 'Mudanzas / carga'],
            ['nombre' => 'Clases particulares'],
            ['nombre' => 'Diseño gráfico'],
            ['nombre' => 'Programación básica'],
        ]);
    }
}