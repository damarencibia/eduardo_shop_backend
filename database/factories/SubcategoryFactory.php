<?php

// database/factories/ProductFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Subcategory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->ean13(), // Código único
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000), // Precio entre 10 y 1000
            'amount' => $this->faker->numberBetween(1, 100), // Cantidad entre 1 y 100
            'state' => $this->faker->randomElement(['disponible', 'agotado']),
            'dimension' => $this->faker->randomElement(['10x20x5 cm', '15x30x10 cm']),
            'weight' => $this->faker->randomFloat(2, 0.1, 50), // Peso entre 0.1 y 50 kg
            'capacity' => $this->faker->randomElement(['1 litro', '5 litros']),
            'ability' => $this->faker->sentence(2),
            'color' => $this->faker->colorName(),
            'category_id' => Category::factory(), // Relación con Category
            'subcategory_id' => Subcategory::factory(), // Relación con Subcategory
        ];
    }
}
