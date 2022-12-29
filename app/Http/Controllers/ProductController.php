<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
/* use Illuminate\Http\Request; */
/* use Yajra\DataTables\Facades\DataTables; */

class ProductController extends Controller
{
	// ---------- methods ----------
	// ---------- Read ----------
	public function showTableProducts()
	{
		$products = $this->getAllProducts()->original['products'];
		return view('products.index', compact('products'));
	}

	// ---------- CRUD methods ----------
    // ---------- Create ----------
	public function createAProduct(CreateProductRequest $request)
	{
		$product = new Product($request->all());
		$this->uploadImage($request, $product);
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

	/* public function getAllProductsForDataTable()
	{
		$products = Product::with('Category');
		return DataTables::of($products)->make();
	} */

	// ---------- Update ----------
	public function updateAProduct(UpdateProductRequest $request, Product $product)
	{
		$request_data = $request->all();
		$this->uploadImage($request, $product);
		$request_data['image'] = $product->image;
		$product->update($request_data);
		return response()->json(['product' => $product->refresh()->load('Category')], 201);
	}

	// ---------- Delete ----------
	public function deleteAProduct(Product $product)
	{
		$product->delete();
		return response()->json([], 204);
	}

	// ---------- Upload Images ----------
	private function uploadImage($request, &$product)
	{
		if (!isset($request->image)) return;
		$random = Str::random(20);
		$image_name = "{$random}.{$request->image->clientExtension()}";
		$request->image->move(storage_path('app/public/images'), $image_name);
		$product->image = $image_name;
	}
}
