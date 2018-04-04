<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class TourController extends Controller
{
    public function show()
    {
        return 'tour-detail';
        // return view('front.home');
    }
}
