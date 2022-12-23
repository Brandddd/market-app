<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategoriesWithProducts()
	{
		$categories = Category::with('Products')->get();
		return view('index', compact('categories'));
	}

	// -------------------- Read --------------------
	public function getAllCategories()
	{
		$categories = Category::get();
		return response()->json(['categories' => $categories], 200);
	}

	public function getAllProductsByCategory(Category $category)
	{
		$categoryWithProducts = $category->load('Products');
		return view('categories.category-products', compact('categoryWithProducts'));
	}
}
