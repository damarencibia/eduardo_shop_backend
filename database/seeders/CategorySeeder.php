<?php

// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Crear categorías de ejemplo
        Category::create(['name' => 'Electrónica']);
        Category::create(['name' => 'Ropa']);
        Category::create(['name' => 'Hogar']);
        Category::create(['name' => 'Deportes']);
        Category::create(['name' => 'Juguetes']);
    }
}
