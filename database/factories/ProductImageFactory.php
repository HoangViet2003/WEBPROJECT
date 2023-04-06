<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductImageFactory extends Factory
{
 /**
  * Define the model's default state.
  *
  * @return array<string, mixed>
  */
 public function definition(): array
 {
  return [
   'product_id' => $this->faker->numberBetween(2, 28),
   'image_url' => $this->faker->imageUrl(640, 480, 'table', true, 'Faker'),
  ];
 }
}
