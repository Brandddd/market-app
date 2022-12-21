<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	// ---------- WEB methods ----------
	// ---------- Read ----------
	public function showHomeWithProducts()
	{
		$products = $this->getAllProducts()->original['products'];
		return view('index', compact('products'));
	}

	// ---------- API methods ----------
    // ---------- Create ----------
	public function createAProduct(Request $request)
	{
		$product = new Product($request->all());
		$product->save();
		return response()->json(['product' => $product], 201);
	}

	// ---------- Read ----------
	public function getAllProducts()
	{
		$products = Product::with('Category')->get();
		return response()->json(['products' => $products], 200);
	}

	public function getAProduct(Product $product)
	{
		return response()->json(['product' => $product], 200);
	}

	// ---------- Update ----------
	public function updateAProduct(Request $request, Product $product)
	{
		$product->update($request->all());
		return response()->json(['product' => $product->refresh()], 201);
	}

	// ---------- Delete ----------
	public function deleteAProduct(Product $product)
	{
		$product->delete();
		return response()->json([], 204);
	}
}
