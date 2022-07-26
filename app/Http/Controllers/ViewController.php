<?php

namespace App\Http\Controllers;

class ViewController
{

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

}