<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallesSeeder extends Seeder
{
    public function run(): void
    {
        $colonias = DB::table('colonias')->pluck('id');

        $calles = [
            'Av Zaragoza',
            'Av Juarez',
            'Circuito Universidades',
            'Av Constituyentes',
            'Calle 5 de Mayo',
            'Av Reforma',
            'Calle Hidalgo',
            'Av Tecnologico',
            'Calle Independencia',
            'Av Benito Juarez',
        ];

        foreach ($calles as $index => $calle) {
            DB::table('calles')->insert([
                'nombre' => $calle,
                'idColonia' => $colonias[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}