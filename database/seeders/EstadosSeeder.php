<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            ['nombre' => 'Aguascalientes'],
            ['nombre' => 'Baja California'],
            ['nombre' => 'Baja California Sur'],
            ['nombre' => 'Campeche'],
            ['nombre' => 'Chiapas'],
            ['nombre' => 'Chihuahua'],
            ['nombre' => 'Ciudad de Mexico'],
            ['nombre' => 'Coahuila'],
            ['nombre' => 'Colima'],
            ['nombre' => 'Durango'],
            ['nombre' => 'Guanajuato'],
            ['nombre' => 'Guerrero'],
            ['nombre' => 'Hidalgo'],
            ['nombre' => 'Jalisco'],
            ['nombre' => 'Mexico'],
            ['nombre' => 'Michoacan'],
            ['nombre' => 'Morelos'],
            ['nombre' => 'Nayarit'],
            ['nombre' => 'Nuevo Leon'],
            ['nombre' => 'Oaxaca'],
            ['nombre' => 'Puebla'],
            ['nombre' => 'Queretaro'],
            ['nombre' => 'Quintana Roo'],
            ['nombre' => 'San Luis Potosi'],
            ['nombre' => 'Sinaloa'],
            ['nombre' => 'Sonora'],
            ['nombre' => 'Tabasco'],
            ['nombre' => 'Tamaulipas'],
            ['nombre' => 'Tlaxcala'],
            ['nombre' => 'Veracruz'],
            ['nombre' => 'Yucatan'],
            ['nombre' => 'Zacatecas'],
        ];

        DB::table('estados')->insert($estados);
    }
}
