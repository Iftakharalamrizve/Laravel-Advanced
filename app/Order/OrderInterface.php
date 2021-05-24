<?php 

namespace App\Order;

interface OrderInterface{

    public function setDiscount(int $amount);

    public function orderInfo(int $amount);

}