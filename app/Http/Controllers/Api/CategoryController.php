<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Food;

class CategoryController extends Controller
{
    public function index() {
        $categories  = Category::all();

        return CategoryResource::Collection($categories);
    }

    public function foods(Category $category) {
        $categories  = Food::where('category_id',$category->id)->get();

        return CategoryResource::Collection($categories);
    }
}
