<?php

namespace App\Http\Controllers;

class ViewController
{

    public function index()
    {
        $data['chart'] = [];
        return view('view.home',$data);
    }

}