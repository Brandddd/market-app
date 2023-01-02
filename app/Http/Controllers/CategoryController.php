<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	// -------------------- Home view --------------------
	public function showCategoriesWithProducts()
	{
		$categories = Category::with('Products')->get();
		return view('index', compact('categories'));
	}

	public function showCategoriesView()
	{
		$categories = $this->getAllCategories()->original['categories'];
		return view('categories.category-list', compact('categories'));
	}

	// -------------------- Create --------------------
	public function createCategory(Request $request)
	{
		try {
			DB::beginTransaction();
			$category = new Category($request->all());
			$category->save();
			DB::commit();
			if ($request->ajax()) return response()->json(['category' => $category], 201);
			return back()->with('success', 'Categoría creada exitosamente.');
		} catch (\Throwable $th) {
			DB::rollBack();
			throw $th;
		}
	}

	// -------------------- Read --------------------
	public function getAllCategories()
	{
		$categories = Category::get();
		return response()->json(['categories' => $categories], 200);
	}

	public function getCategory(Category $category)
	{
		return response()->json(['category' => $category], 200);
	}

	public function getAllProductsByCategory(Category $category)
	{
		$categoryWithProducts = $category->load('Products');
		return view('categories.category-products', compact('categoryWithProducts'));
	}

	// -------------------- Update --------------------
	public function updateCategory(Category $category, Request $request)
	{
		$request_data = $request->all();
		$category->update($request_data);
		return response()->json(['category' => $category->refresh()], 201);
	}

	// -------------------- Delete --------------------
	public function deleteCategory(Category $category)
	{
		$categoryWithProducts = $category->load('Products');
		$categoryWithProducts->delete();
		return response()->json([], 204);
	}
}
