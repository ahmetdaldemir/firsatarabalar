<?php

namespace App\Http\Controllers;


class ViewController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['chart'] = [];
        return view('view.home',$data);
    }

    public function how_run_system()
    {
        $data['chart'] = [];
        return view('view.how_run_system',$data);
    }

    public function customer_comment()
    {
        $data['chart'] = [];
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