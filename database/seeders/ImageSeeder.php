<?php

// database/seeders/ImageSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;

class ImageSeeder extends Seeder
{
    public function run()
    {
        // Obtener todos los productos
        $products = Product::all();

        // Crear imágenes para cada producto
        $products->each(function ($product) {
            Image::create([
                'path' => 'https://via.placeholder.com/640x480.png/00ff77?text=Product+Image',
                'product_id' => $product->id,
            ]);
        });
    }
}
