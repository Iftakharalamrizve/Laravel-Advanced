<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Order\OrderInterface;
use App\Order\BankPayment;
use App\Order\CreditPayment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton(OrderInterface::class,function($app){
           if(request()->type == 'credit'){
                return new CreditPayment('usd');
           }
           return new BankPayment('usd');

       });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
