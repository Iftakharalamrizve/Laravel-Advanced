<?php 

namespace App\Order;
use App\Order\OrderInterface; 

class OrderSetting{

    private $BankPayment ;

    public function __construct(OrderInterface $BankPayment)
    {
        $this->BankPayment = $BankPayment;
    }


    public function setDiscountInfo($amount)
    {
        $this->BankPayment->setDiscount($amount);
    }
}