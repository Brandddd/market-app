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
}
