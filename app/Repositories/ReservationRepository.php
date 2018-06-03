<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Date;
use App\Tour;
use App\Contact;
use App\Reservation;
use App\Pax;

class ReservationRepository{

       public function tourStatusCheck(Tour $tour)
       {
            if ((!$tour) or ($tour->status !== 1)) {
                abort(400, 'Tour invalid.');
            }
       }

        public function checkDateIsPast(Date $date)
        {
            if (Carbon::now() > $date->start_date) {
                abort(400, 'Date invalid.');
            }
        }

        public function maxAdultCountCheck($adult)
        {
            if (intval($adult) > 5) {
                abort(400, 'Too much pax.');
            }
        }

        public function paxCountCheck(Request $request)
        {
            if ((int)$request->pax_count !== count($request->pax)) {
                abort(400, 'pax counts not equal');
            }
        }

        public function getDateWithId($id)
        {
            return Date::findOrFail($id);
        }

        public function getDateAvailable(Date $date) : int
        {
            //maximum pax count
            $maximum = $date->max_pax;
            //reservated pax count for this date
            $reservated_pax_count = $date->contacts->count();
            //calculate available count
            $available = $maximum - $reservated_pax_count;
            return $available;
        }

        public function checkDatePaxAvailability(Request $request, Date $date)
        {
            if ($this->getDateAvailable($date) < (int)$request->pax_count) {
                abort(400, 'not available');
            }
        }

        public function createNewContact(Request $request, Date $date)
        {
            $contact = new Contact();
            $contact->date_id = $date->id;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->address = $request->address;
            $contact->phone = $request->phone;
            $contact->country = 'default';
            
            if ($contact->save() == false) {
                abort(400, 'contact save error');
            }
            return $contact;

        }

        public function createNewReservation(Request $request, Date $date, Contact $contact)
        {
            $reservation = new Reservation();
            $reservation->date_id = $date->id;
            $reservation->tour_id = $date->tour_id;
            $reservation->contact_id = $contact->id;
            $reservation->pax = (int)$request->pax_count;
            $reservation->price = $date->price;

            $total_price = (int)$request->pax_count * (int)$date->price;
        
            $reservation->total_price = $total_price;
            $reservation->currency = $date->currency;
            $reservation->payment_status = 0;

            if ($reservation->save() == false) {
                abort(400, 'reservation save error');
            }
            return $reservation;
        }

        public function savePaxes($pax, Date $date, $reservation_id)
        {
            $pax->each(function ($item, $key) use ($date, $reservation_id) {
                $newPax = new Pax();
                $newPax->date_id = $date->id;
                $newPax->reservation_id = $reservation_id;
                $newPax->name = $item['name'];
                $newPax->gender = $item['gender'];
                $newPax->save();
            });
        }
}
