<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $tours = $category->tours;
        return view('front.category', compact('category', 'tours'));
    }
}
