<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tour;

class TourController extends Controller
{
    public function show(Tour $tour)
    {
        // return 'tour-detail ' . request('tour');
        return view('front.tour', compact('tour'));
    }
}
