<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->get();
        return view ('categoryPosts', compact('posts'));
    }
}
