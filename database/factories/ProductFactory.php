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
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->firstName,
            'description' => $this->faker->word(5),
            'category_id' => rand(1, 3),
            'purchased_price' => $this->faker->randomFloat(2, 1000, 100000),
            'retail_price' => $this->faker->randomFloat(2, 1000, 100000),
            'quantity' => rand(1, 20),
        ];
    }
}