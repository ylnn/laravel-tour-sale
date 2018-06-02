<?php

namespace App\Custom;

class PaymentInfo 
{
    private $cardName;
    private $cardNo;
    private $month;
    private $year;
    private $cvc;
    private $amount;
    private $currency;


    function __construct(string $cardName, int $cardNo, int $month, int $year, int $cvc, int $amount, string $currency){
        $this->cardName = $cardName;
        $this->cardNo = $cardNo;
        $this->month = $month;
        $this->year = $year;
        $this->cvc = $cvc;
        $this->amount = $amount;
        $this->currency = $currency;
    }
    public function getCardName()
    {
        return $this->cardName;   
    }

    public function getCardNo()
    {
        return $this->cardNo;   
    }

    public function getMonth()
    {
        return $this->month;   
    }

    public function getYear()
    {
        return $this->year; 
    }

    public function getCvc()
    {
        return $this->cvc;   
    }

    public function getAmount()
    {
        return $this->amount;   
    }

    public function getCurrency()
    {
        return $this->currency; 
    }
}
