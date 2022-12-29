<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeed;
use Database\Seeders\UserSeed;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([
			UserSeed::class,
			CategorySeed::class
		]);

		User::factory(10)->create();
		Product::factory(100)->create();
	}
}
