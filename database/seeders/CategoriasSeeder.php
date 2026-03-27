<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Limpieza',
                'descripcion' => 'Servicios de limpieza de casas, oficinas y espacios comerciales'
            ],
            [
                'nombre' => 'Electricista',
                'descripcion' => 'Instalaciones electricas, reparaciones y mantenimiento'
            ],
            [
                'nombre' => 'Plomeria',
                'descripcion' => 'Reparacion de tuberias, fugas y sistemas de agua'
            ],
            [
                'nombre' => 'Carpinteria',
                'descripcion' => 'Fabricacion y reparacion de muebles de madera'
            ],
            [
                'nombre' => 'Albanileria',
                'descripcion' => 'Construccion, remodelacion y mantenimiento de obras'
            ],
            [
                'nombre' => 'Pintura',
                'descripcion' => 'Pintura de interiores y exteriores'
            ],
            [
                'nombre' => 'Jardineria',
                'descripcion' => 'Mantenimiento de jardines y areas verdes'
            ],
            [
                'nombre' => 'Cocina',
                'descripcion' => 'Preparacion de alimentos y servicios de cocina'
            ],
            [
                'nombre' => 'Reparacion de electrodomesticos',
                'descripcion' => 'Mantenimiento y reparacion de aparatos del hogar'
            ],
            [
                'nombre' => 'Tecnologia',
                'descripcion' => 'Soporte tecnico, redes y computadoras'
            ],
            [
                'nombre' => 'Mecanica',
                'descripcion' => 'Reparacion y mantenimiento de vehiculos'
            ],
            [
                'nombre' => 'Seguridad',
                'descripcion' => 'Servicios de vigilancia y proteccion'
            ],
        ];

        DB::table('categorias')->insert($categorias);
    }
}
