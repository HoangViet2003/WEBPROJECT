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
            'name' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(100, 500),
            'description' => $this->faker->realText($maxNbChars = 50),
            'category_id' => $this->faker->numberBetween(1, 4),
            'quantity' => $this->faker->numberBetween(0, 1000),
            'status' => $this->faker->randomElement(['out_of_stock', 'in_stock', 'running_low']),
            'rating' => $this->faker->numberBetween(1, 5)
        ];
    }
}
