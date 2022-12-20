<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    public function run()
    {
		// Categoría ID 1
        DB::table('categories')->insert([
			'name' => 'Aseo',
		]);
		// Categoría ID 2
        DB::table('categories')->insert([
			'name' => 'Autos',
		]);
		// Categoría ID 3
        DB::table('categories')->insert([
			'name' => 'Computación',
		]);
		// Categoría ID 4
        DB::table('categories')->insert([
			'name' => 'Deportes',
		]);
		// Categoría ID 5
        DB::table('categories')->insert([
			'name' => 'Electrodomésticos',
		]);
    }
}
