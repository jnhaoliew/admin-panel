<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => fake()->word(),
            'product_desc' => fake()->sentence($nbWords = 7, $variableNbWords = true),
            'product_img' => fake()->imageUrl(),
            'product_price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
        ];
    }
}
