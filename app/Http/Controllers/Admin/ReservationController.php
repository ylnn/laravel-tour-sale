<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;

class ReservationController extends Controller
{

    public $baseRoute = "admin.reservation";
    public $indexRoute = "admin.reservation.index";
    public $model = "App\Reservation";

    public function index()
    {
        $records = Reservation::all();
        $baseRoute = $this->baseRoute;
        return view('admin.reservation.index', compact('records', 'baseRoute'));
    }

    public function show(Reservation $reservation)
    {
        $record = $reservation;
        $baseRoute = $this->baseRoute;
        return view('admin.reservation.show', compact('record', 'baseRoute'));
    }
    public function destroy(Reservation $reservation)
    {
       $reservation->delete(); 
       showMessage(trans('adminLang.deleted'), 'success');
       return back();
    }
}
