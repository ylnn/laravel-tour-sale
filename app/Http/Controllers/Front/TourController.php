<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tour;
use App\Date;
use Validator;
use App\Reservation;
use App\User;

class TourController extends Controller
{
    public function show(Tour $tour)
    {
        $show = 'tour';
        return view('front.tour_detail', compact('tour'));
    }

    public function reservationStep1(Date $date)
    {
        $tour = $date->tour;
        if((!$tour) or ($tour->status !== 1)){
            return 'tour not found.'; 
        }
        return view('front.reservation_step1', compact('tour', 'date'));
    }

    public function reservationStep2(Request $request, Date $date, $adult)
    {
        $adult = intval($adult);
        if($adult > 5){
            return response('too much participants');
        }

        $tour = $date->tour;
        if((!$tour) or ($tour->status !== 1)){
            return 'tour not found.'; 
        }

        $total_price = $date->price * $adult;
        $currency = $date->currency;
        
        return view('front.reservation_step2', compact('tour', 'date', 'adult', 'total_price', 'currency'));
    }

    public function reservationPost(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "string|required",
            "email" => "required|email",
            "address" => "string|required",
            "pax_count" => "integer|required",
            "gender.*" => "string|required",
            "pax.*" => "string",
        ]);

        if($validator->fails()){
            return $validator->errors();
        } 

    
        if((int)$request->pax_count !== count($request->pax)){
            return response()->json('pax count error', 400);
        }


        $date = $this->getDateWithId($request->date_id);

        $reservation = new Reservation();
        $reservation->reservation_id = str_random(70);
        $reservation->date_id = $date->id;
        $reservation->tour_id = $date->tour_id;


        // dd($request->all());   
    }


    protected function getDateWithId($id)
    {
        return Date::findOrFail($id);   
    }

    protected function createUser($name, $email, $address)
    {
        $user = new User();   
    }

}
