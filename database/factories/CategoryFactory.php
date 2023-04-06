<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            // Random name in array: ["Chair",  "Accessories", "Table", "Bed"]
            'name' => $this->faker->randomElement(['Chair',  'Accessories', 'Table', 'Bed']),
        ];
    }
}
