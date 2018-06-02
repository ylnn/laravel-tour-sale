<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;

class PaymentController extends Controller
{

    public $baseRoute = "admin.payment";
    public $indexRoute = "admin.payment.index";
    public $model = "App\Payment";

    public function index()
    {
        $records = Payment::all();
        $baseRoute = $this->baseRoute;
        return view('admin.payment.index', compact('records', 'baseRoute'));
    }

    public function show(Payment $payment)
    {
        
    }
    public function delete(Payment $payment)
    {
        
    }
}
