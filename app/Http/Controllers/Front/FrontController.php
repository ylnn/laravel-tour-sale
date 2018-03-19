<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class FrontController extends Controller
{
    public function home()
    {
        return view('front.home');
    }
}
