<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    public function run(): void
    {
        $estatus = [
            ['nombre' => 'Activo'],
            ['nombre' => 'Inactivo'],
            ['nombre' => 'Pagado'],
            ['nombre' => 'En proceso'],
            ['nombre' => 'Finalizado'],
            ['nombre' => 'Postulacion'],
            ['nombre' => 'Seleccion'],
            ['nombre' => 'Enviado'],
            ['nombre' => 'Recibido'],
        ];

        DB::table('estatus')->insert($estatus);
    }
}