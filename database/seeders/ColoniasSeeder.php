<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColoniasSeeder extends Seeder
{
    public function run(): void
    {
        $municipios = DB::table('municipios')->pluck('id');

        $colonias = [
            ['nombre' => 'Centro', 'codigoPostal' => '76000'],
            ['nombre' => 'Centro', 'codigoPostal' => '76800'],
            ['nombre' => 'La Pradera', 'codigoPostal' => '76246'],
            ['nombre' => 'El Pueblito', 'codigoPostal' => '76900'],
            ['nombre' => 'Centro', 'codigoPostal' => '76750'],
            ['nombre' => 'Centro', 'codigoPostal' => '76500'],
            ['nombre' => 'Centro', 'codigoPostal' => '76300'],
            ['nombre' => 'Centro', 'codigoPostal' => '76850'],
            ['nombre' => 'Centro', 'codigoPostal' => '76300'],
            ['nombre' => 'Centro', 'codigoPostal' => '76600'],
        ];

        foreach ($colonias as $index => $colonia) {
            DB::table('colonias')->insert([
                'nombre' => $colonia['nombre'],
                'codigoPostal' => $colonia['codigoPostal'],
                'idMunicipio' => $municipios[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}