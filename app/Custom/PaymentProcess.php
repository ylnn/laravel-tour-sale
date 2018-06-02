<?php

namespace App\Custom;

use App\Reservation;


class PaymentProcess 
{
    private $rezId;
    private $paymentInfo;
    private $status = false;
    private $message = "error";


    function __construct(PaymentInfo $paymentInfo, $rezId){
        $this->paymentInfo = $paymentInfo;
        $this->rezId = $rezId;
    }

    public function MakeProcess()
    {
        // dd($this->paymentInfo);
        // DEMO PAYMENT CHECK
        if (($this->paymentInfo->getCardNo() === 1234123412341234) and ($this->paymentInfo->getMonth() === 1) and ($this->paymentInfo->getYear() === 2030)) {
            //success
            $this->status = true;
            $this->message = "Success";
            return true;
        }

        //unsuccess
        $this->status = false;
        $this->message = "Error on payment process";
        return false;
    }

    public function getStatus() :bool
    {
        return $this->status;   
    }

    public function getMessage(): string
    {
        return $this->message;   
    }
    
    public function getAmount(): int
    {
        return $this->paymentInfo->getAmount();
    }

    public function getCurrency() : string
    {
        return $this->paymentInfo->getCurrency();
    }

    public function getCardHolder() : string
    {
        return $this->paymentInfo->getCardName();
    }

    public function getCardNo() : string
    {
        if(strlen($this->paymentInfo->getCardNo()) == 16) {
            return preg_replace("/^(\d){12}/", "************", $this->paymentInfo->getCardNo());
        }
        return "****";
    }

}
