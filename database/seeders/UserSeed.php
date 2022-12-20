<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{

	public function run()
	{
		DB::table('users')->insert([
			'number_id' => '1088351988',
			'name' => 'Brandon',
			'last_name' => 'Alvarez',
			'email' => 'b.palacio1@utp.edu.co',
			'password' => bcrypt(1234567890),
		]);
	}
}
