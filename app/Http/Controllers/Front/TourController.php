<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tour;
use App\Date;

class TourController extends Controller
{
    public function show(Tour $tour)
    {
        // return 'tour-detail ' . request('tour');
        return view('front.tour', compact('tour'));
    }

    public function reservationShow(Date $date)
    {
        $tour = $date->tour;
        if((!$tour) or ($tour->status !== 1)){
            return 'tour not found.'; 
        }
        return view('front.reservation_show', compact('tour', 'date'));
    }
}
