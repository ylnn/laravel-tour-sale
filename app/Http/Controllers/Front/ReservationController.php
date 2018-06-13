<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\ReservationRepository;
use App\Http\Requests\ReservationPostRequest;
use App\Date;

class ReservationController extends Controller
{
    /* Select Pax */
    public function select(Date $date, ReservationRepository $repo)
    {
        $tour = $date->tour;

        $repo->tourStatusCheck($tour);

        $repo->checkDateIsPast($date);

        $pageTitle = trans('frontLang.reservation'). ": $tour->name";

        return view('front.reservation_step1', compact('tour', 'date', 'pageTitle'));
    }

    public function contact(Request $request, Date $date, $adult, ReservationRepository $repo)
    {

        $tour = $date->tour;

        $repo->maxAdultCountCheck($adult);

        $repo->tourStatusCheck($tour);

        $repo->checkDateIsPast($date);

        $total_price = (int)$date->price * (int)$adult;

        $currency = $date->currency;

        $pageTitle = trans('frontLang.reservation') . ": $tour->name";
        
        return view('front.reservation_step2', compact('tour', 'date', 'adult', 'total_price', 'currency', 'pageTitle'));
    }


    public function post(ReservationPostRequest $request, ReservationRepository $repo)
    {

        $repo->paxCountCheck($request);

        $date = $repo->getDateWithId($request->date_id);
        
        $repo->checkDateIsPast($date);
        
        $repo->checkDatePaxAvailability($request, $date);

        //TRANSACTION START
        $reservation_id = DB::transaction(function () use ($date, $request, $repo) {
            $pax = collect($request->pax);

            // Create Contact
            $contact = $repo->createNewContact($request, $date);

            // Create reservation
            $reservation = $repo->createNewReservation($request, $date, $contact);

            // Reservation Id
            $reservation_id = $reservation->id;

            // Create Paxes
            $repo->savePaxes($pax, $date, $reservation_id);

            return $reservation_id;
        }); // TRANSACTION END

        if (isset($reservation_id)) {
            return redirect()->route('payment.show', [$reservation_id]);
        }
    }

}