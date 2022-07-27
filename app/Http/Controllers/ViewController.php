<?php

namespace App\Http\Controllers;


class ViewController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['chart'] = [];
        return view('view.home',$data);
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