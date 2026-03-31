<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    public function run(): void
    {
        $estadoId = DB::table('estados')
            ->where('nombre', 'Queretaro')
            ->value('id');

        $municipios = [
            ['nombre' => 'Queretaro', 'idEstado' => $estadoId],
            ['nombre' => 'San Juan del Rio', 'idEstado' => $estadoId],
            ['nombre' => 'El Marques', 'idEstado' => $estadoId],
            ['nombre' => 'Corregidora', 'idEstado' => $estadoId],
            ['nombre' => 'Tequisquiapan', 'idEstado' => $estadoId],
            ['nombre' => 'Cadereyta', 'idEstado' => $estadoId],
            ['nombre' => 'Jalpan de Serra', 'idEstado' => $estadoId],
            ['nombre' => 'Amealco', 'idEstado' => $estadoId],
            ['nombre' => 'Pinal de Amoles', 'idEstado' => $estadoId],
            ['nombre' => 'Toliman', 'idEstado' => $estadoId],
        ];

        DB::table('municipios')->insert($municipios);
    }
}