<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tour;

class FrontController extends Controller
{
    public function home()
    {
        $populars = Tour::with('photos')->get();
        return view('front.home', compact('populars'));
    }
}
