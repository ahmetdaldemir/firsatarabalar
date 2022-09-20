<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarPaymentTransaction;
use App\Models\CustomerCarPhoto;
use App\Models\CustomerCarValuation;
use App\Models\Page;
use Illuminate\Console\Command;
use  \DB;
use Illuminate\Support\Str;

class PhoneChange extends Command
{

    protected $signature = 'phone:change';

    protected $description = 'Command description';

    public function handle()
    {
         $customers = Customer::all();
         foreach ($customers as $customer)
         {
             $customer->phone = str_replace("09","",$customer->phone);
             $customer->save();
         }
    }
}