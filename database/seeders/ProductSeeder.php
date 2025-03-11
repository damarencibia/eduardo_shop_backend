<?php

// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Obtener subcategorías
        $smartphones = Subcategory::where('name', 'Smartphones')->first();
        $laptops = Subcategory::where('name', 'Laptops')->first();
        $tshirts = Subcategory::where('name', 'Camisetas')->first();
        $pants = Subcategory::where('name', 'Pantalones')->first();

        // Crear productos
        Product::create([
            'code' => 'PROD001',
            'name' => 'iPhone 13',
            'description' => 'El último smartphone de Apple.',
            'price' => 999.99,
            'amount' => 50,
            'state' => 'disponible',
            'dimension' => '14.67 x 7.15 x 0.76 cm',
            'weight' => 0.174,
            'capacity' => '128 GB',
            'ability' => 'Resistente al agua',
            'color' => 'Midnight',
            'category_id' => $smartphones->category_id,
            'subcategory_id' => $smartphones->id,
        ]);

        Product::create([
            'code' => 'PROD002',
            'name' => 'MacBook Pro',
            'description' => 'Laptop potente para profesionales.',
            'price' => 1999.99,
            'amount' => 30,
            'state' => 'disponible',
            'dimension' => '30.41 x 21.24 x 1.55 cm',
            'weight' => 1.4,
            'capacity' => '512 GB',
            'ability' => 'Pantalla Retina',
            'color' => 'Space Gray',
            'category_id' => $laptops->category_id,
            'subcategory_id' => $laptops->id,
        ]);

        // Crear más productos usando factories
        // Product::factory()->count(20)->create();
    }
}
