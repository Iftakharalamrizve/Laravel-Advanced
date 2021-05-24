<?php 

namespace App\Order;
use App\Order\OrderInterface;

class BankPayment implements OrderInterface {

    private $currency ;
    private $discount = 0 ;

    public function __construct($currency)
    {
        $this->currency = $currency ;
    }


    public function setDiscount($amount)
    {
        $this->discount = $amount ;
    }

    public function orderInfo($amount)
    {
        return [
            'currency'=>$this->currency,
            'amount' => $amount ,
            'dicount'=>$this->discount 
        ];
    }



}