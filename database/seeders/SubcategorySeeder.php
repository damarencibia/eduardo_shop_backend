<?php

// database/seeders/SubcategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        // Obtener categorías
        $electronics = Category::where('name', 'Electrónica')->first();
        $clothing = Category::where('name', 'Ropa')->first();
        $home = Category::where('name', 'Hogar')->first();
        $sports = Category::where('name', 'Deportes')->first();
        $toys = Category::where('name', 'Juguetes')->first();

        // Crear subcategorías para cada categoría
        Subcategory::create(['name' => 'Smartphones', 'category_id' => $electronics->id]);
        Subcategory::create(['name' => 'Laptops', 'category_id' => $electronics->id]);
        Subcategory::create(['name' => 'Camisetas', 'category_id' => $clothing->id]);
        Subcategory::create(['name' => 'Pantalones', 'category_id' => $clothing->id]);
        Subcategory::create(['name' => 'Muebles', 'category_id' => $home->id]);
        Subcategory::create(['name' => 'Electrodomésticos', 'category_id' => $home->id]);
        Subcategory::create(['name' => 'Fútbol', 'category_id' => $sports->id]);
        Subcategory::create(['name' => 'Baloncesto', 'category_id' => $sports->id]);
        Subcategory::create(['name' => 'Muñecas', 'category_id' => $toys->id]);
        Subcategory::create(['name' => 'Carros', 'category_id' => $toys->id]);
    }
}
