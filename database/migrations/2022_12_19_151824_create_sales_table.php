<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('sales', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('customer_user_id')->unsigned();
			$table->bigInteger('product_id')->unsigned();
			$table->enum('status', ['sold', 'active']);   // sold -> Vendido // active -> en progreso
			$table->timestamps();
			$table->softDeletes();

			// --- Relations ---
			$table
				->foreign('customer_user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table
				->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('sales');
	}
};
