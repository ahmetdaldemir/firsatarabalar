<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\Page;
use App\Models\Review;
use App\Services\Make;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController
{
    protected $service;
    public function __construct()
    {
        $this->service = new Make();
    }


    public function index()
    {

        $data['chart'] = [];
        $data['customer_cars'] = CustomerCar::all();
        $data['brands'] = $this->service->brands();
        $data['blogs'] = $this->service->blogs();
        $data['reviews'] =  $this->service->reviews();
        return view('view.home',$data);
    }

    public function pages(Request $request)
    {
        $data['pages'] = Page::where('slug',$request->slug)->first();
        return view('view.pages',$data);
    }

    public function how_run_system()
    {
        $data['chart'] = [];
        return view('view.how_run_system',$data);
    }

    public function customer_comment()
    {
        $data['chart'] = [];
        $data['reviews'] = Review::where('status',1)->get();
        return view('view.customer_comment',$data);
    }

    public function carSell()
    {
        $data['chart'] = [];
        return view('view.car_sell',$data);
    }

    public function contact()
    {
        $data['chart'] = [];
        return view('view.contact',$data);
    }

 }