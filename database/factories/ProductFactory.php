<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

	protected $model = Product::class;

	public function definition()
	{
		return [
			'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
			'name' => $this->faker->sentence(2),
			'description' => $this->faker->paragraph(),
			'stock' => $this->faker->randomDigit(),
			'price' => $this->faker->randomFloat(2, 1, 100000),
		];
	}
}
