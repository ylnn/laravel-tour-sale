<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Tour;
use App\Date;
use Validator;
use App\Reservation;
use App\User;
use App\Pax;
use App\Contact;
use Carbon\Carbon;

class TourController extends Controller
{
    public function show(Tour $tour)
    {
        $show = 'tour';
        $pageTitle = $tour->name;
        $dates = $tour->dates()->where('start_date', '>', Carbon::now())->get();
        return view('front.tour_detail', compact('tour', 'pageTitle', 'dates'));
    }

}
