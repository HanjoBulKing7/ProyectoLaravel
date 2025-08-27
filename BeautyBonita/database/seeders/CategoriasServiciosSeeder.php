<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categorias = [
            ['nombre' => 'Tratamientos Faciales', 'slug' => 'facial', 'estado' => 'activa'],
            ['nombre' => 'Tratamientos Corporales', 'slug' => 'corporal', 'estado' => 'activa'],
            ['nombre' => 'Manos y Pies', 'slug' => 'manos-pies', 'estado' => 'activa'],
            ['nombre' => 'Maquillaje', 'slug' => 'maquillaje', 'estado' => 'activa'],
            ['nombre' => 'Cejas y Pestañas', 'slug' => 'cejas-pestanas', 'estado' => 'activa'],
            ['nombre' => 'Depilación', 'slug' => 'depilacion', 'estado' => 'activa'],
            ['nombre' => 'Otros Servicios', 'slug' => 'otros', 'estado' => 'activa'],
        ];

        DB::table('categorias_servicios')->insert($categorias);
    }
}
