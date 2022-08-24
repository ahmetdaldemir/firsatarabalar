<?php

namespace App\Jobs;

use App\Models\Affiliate;
use App\Models\Customer;
use App\Services\Sms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AffiliateMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $model;
    protected $sms;
    protected $customer;

    public function __construct(Affiliate $affiliate,Customer $customer)
    {
        $this->model = $affiliate;
        $this->customer = $customer;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request['message'] = "Sayın". $this->model->fullname . " " .$this->customer->firstname. " ". $this->customer->lastname." tarafından https://www.firsatarabalar.com sitesine üye olarak aracınızı 1 saat içerisinde satabilme fırsatını yakalayabilmeniz için istek gönderildi";
        $request['phone'] = "90".$this->model->phone;
        $this->sms = new Sms($request);
        return $this->sms;
    }
}
