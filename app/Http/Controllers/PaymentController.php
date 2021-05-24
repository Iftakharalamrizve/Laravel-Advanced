<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order\OrderInterface;
use App\Order\OrderSetting;
class PaymentController extends Controller
{
    public function store( OrderSetting $orderSetting , OrderInterface $BankPaymentInterface ){

        $orderSetting->setDiscountInfo(50);
        dd($BankPaymentInterface->orderInfo(2500));

    }
}
