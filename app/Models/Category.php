<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name',
	];

	// --- Relations ---
	public function Products()
	{
		return $this->hasMany(Product::class, 'category_id', 'id');
	}
}
