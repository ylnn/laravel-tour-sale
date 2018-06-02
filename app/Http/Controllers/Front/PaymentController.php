<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Custom\PaymentInfo;
use App\Custom\PaymentProcess;
use App\Payment;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function show(Reservation $reservation)
    {
        if($reservation->payment_status > 0) {
            return "Payment already received.";
        } 
        return view('front.payment.show', compact('reservation'));
    }

    public function makePayment(Request $request, Reservation $reservation)
    {
        if($reservation->payment_status > 0) {
            return "Payment already received.";
        } 
        
        $this->validate($request, [
            'cardName' => 'required|string',
            'cardNo' => 'required|integer|digits:16',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2018|max:2099',
            'cvc' => 'required|integer|digits:3'
        ]);

        $paymentInfo = new PaymentInfo(
                            (string)$request->cardName, 
                            (int)$request->cardNo, 
                            (int)$request->month, 
                            (int)$request->year, 
                            (int)$request->cvc,
                            (int)$reservation->total_price,
                            (string)$reservation->currency
                        );

        $paymentResult = $this->startPaymentProcess($paymentInfo, $reservation);

        if($paymentResult === true) {
            dd('payment OK!');
        }

        return back()->withErrors([
            'payment' => $paymentResult['message']
        ]);

    }

    protected function startPaymentProcess(PaymentInfo $paymentInfo, Reservation $reservation)
    {
        $process = $this->makeProcess($paymentInfo, $reservation);

        $errorArray = [
            'status' => false,
            'message' => 'Error'
        ];

        if($process->getStatus() == false){
            Log::alert('*** payment unsuccess >> resId : '. $reservation->id);
            $errorArray['message'] = $process->getMessage();
            return $errorArray;
        }

        if(!$this->savePayment($reservation, $process)){
            Log::alert('*** payment ok but payment save error: ' . $reservation->id);
            return false;
        }
        
        $reservation->payment_status = 1;
        $reservation->save();

        return true;
    }

    protected function makeProcess(PaymentInfo $paymentInfo, Reservation $reservation) 
    {
        $process = new PaymentProcess($paymentInfo, $reservation->id);
        $process->MakeProcess();
        return $process;
    }

    protected function savePayment(Reservation $reservation, PaymentProcess $process)
    {
        $payment = new Payment();
        $payment->res_id = $reservation->id;
        $payment->amount = $process->getAmount();
        $payment->currency = $process->getCurrency();
        $payment->card_holder = $process->getCardHolder();
        $payment->card_no = $process->getCardNo();
        return $payment->save();
    }
}
