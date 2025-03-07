<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear 10 usuarios
        \App\Models\User::factory()->count(10)->create();

        // Crear 5 categorías
        \App\Models\Category::factory()->count(5)->create();

        // Crear 10 subcategorías
        \App\Models\Subcategory::factory()->count(10)->create();

        // Crear 20 productos, cada uno con 3 imágenes
        \App\Models\Product::factory()
            ->count(20)
            ->has(\App\Models\Image::factory()->count(3))
            ->create();
    }
}
