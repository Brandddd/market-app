<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
	// -------------------- Show view --------------------
	public function showShoppingCart()
	{
		return view('sales.shopping-cart');
	}
}
