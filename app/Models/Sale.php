<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\models\User;

class Sale extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'customer_user_id',
		'product_id',
		'status'
	];

	// --- Relations ---
	public function Customer()
	{
		return $this->belongsTo(User::class, 'customer_user_id', 'id');
	}

	public function Product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}
}
