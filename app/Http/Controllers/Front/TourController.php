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
        $dates = $tour->dates()->where('start_date', '>' ,Carbon::now())->get();
        return view('front.tour_detail', compact('tour', 'pageTitle', 'dates'));
    }

    public function reservationStep1(Date $date)
    {
        $tour = $date->tour;
        if ((!$tour) or ($tour->status !== 1)) {
            return 'Tour invalid.';
        }

        if ($this->checkDateIsPast($date)) {
            return 'Date is invalid.';
        }

        $pageTitle = trans('frontLang.reservation'). ": $tour->name";

        return view('front.reservation_step1', compact('tour', 'date', 'pageTitle'));
    }

    public function reservationStep2(Request $request, Date $date, $adult)
    {
        $adult = intval($adult);
        if ($adult > 5) {
            return response('too much participants');
        }

        $tour = $date->tour;

        if ((!$tour) or ($tour->status !== 1)) {
            return 'tour not found.';
        }

         if ($this->checkDateIsPast($date)) {
            return 'Date is invalid.';
        }


        $total_price = (int)$date->price * (int)$adult;
        $currency = $date->currency;

        $pageTitle = trans('frontLang.reservation') . ": $tour->name";
        
        return view('front.reservation_step2', compact('tour', 'date', 'adult', 'total_price', 'currency', 'pageTitle'));
    }

    public function reservationPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "string|required",
            "email" => "required|email",
            "phone" => "string|required",
            "address" => "string|required",
            "pax_count" => "integer|required",
            "pax.*.gender" => "string|required|in:mr,mrs,miss",
            "pax.*.name" => "string",
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors(['error' => trans("frontLang.please-fill-form-correctly")])
                    ->withInput();
        }

        if ((int)$request->pax_count !== count($request->pax)) {
            return response()->json('pax count error', 400);
        }

        $date = $this->getDateWithId($request->date_id);
        
         if ($this->checkDateIsPast($date)) {
            return 'Date is invalid.';
        }
        
        $available = $this->getDateAvailable($date);
 
        if ($available < (int)$request->pax_count) {
            return response()->json('not available', 400);
        }

        
        
        //TRANSACTION START
        $reservation_id = DB::transaction(function () use ($date, $request) {
            $pax = collect($request->pax);

            // Create Contact

            $contact = new Contact();
            $contact->date_id = $date->id;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->address = $request->address;
            $contact->phone = $request->phone;
            $contact->country = 'default';

            if ($contact->save() == false) {
                return response()->json('contact save error', 400);
            }

            $contact_id = $contact->id;

            // dd('contact saved');


            // Create reservation
            $reservation = new Reservation();
            $reservation->date_id = $date->id;
            $reservation->tour_id = $date->tour_id;
            $reservation->contact_id = $contact_id;
            $reservation->pax = (int)$request->pax_count;
            $reservation->price = $date->price;

            $total_price = (int)$request->pax_count * (int)$date->price;
       
            $reservation->total_price = $total_price;
            $reservation->currency = $date->currency;
            $reservation->payment_status = 0;


            if ($reservation->save() == false) {
                return response()->json('reservation save error', 400);
            }

            $reservation_id = $reservation->id;

            $pax->each(function ($item, $key) use ($date, $reservation_id) {
                $newPax = new Pax();
                $newPax->date_id = $date->id;
                $newPax->reservation_id = $reservation_id;
                $newPax->name = $item['name'];
                $newPax->gender = $item['gender'];
                $newPax->save();
            });

            return $reservation_id;
        }); // TRANSACTION END

        if (isset($reservation_id)) {
            return redirect()->route('payment.show', [$reservation_id]);
        }
    }


    protected function getDateWithId($id)
    {
        return Date::findOrFail($id);
    }

    protected function getDateAvailable(Date $date) : int
    {
        //maximum pax count
        $maximum = $date->max_pax;

        //reservated pax count for this date
        $reservated_pax_count = $date->contacts->count();

        //calculate available count
        $available = $maximum - $reservated_pax_count;

        return $available;
    }

    protected function checkDateIsPast(Date $date)
    {
        if($date->start_date < Carbon::now()->addDay())   {
            return true;
        }
        return false;
    }
}
