<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
	// -------------------- Show view --------------------
	public function showShoppingCart()
	{
		return view('sales.shopping-cart-list');
	}

	// -------------------- Add Product to Cart --------------------
	public function addProductToCart(Product $product)
	{
		$product->load('Category');
		return view('sales.shopping-cart', compact('product'));
	}
}
