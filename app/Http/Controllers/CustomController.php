<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Services\Make;
use Illuminate\Http\Request;
use Redis;

class CustomController extends Controller
{
     protected $service;
    public function __construct()
    {

        $this->service = new Make();
    }

    public function models(Request $request)
    {
      return $this->service->model($request->id);
    }

    public function districts(Request $request)
    {
        return $this->service->districts($request->id);
    }



 }