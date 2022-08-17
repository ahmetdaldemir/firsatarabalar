<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Make;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CustomController extends Controller
{

    protected $service;
    public function __construct()
    {
        $this->service = new Make();
    }
    public function Cacheflush()
    {
        Cache::flush();
    }

    public function years()
    {
        $y = (int)  date('Y');
        $x = [];
        for($i = $y; $i >= 1965; $i--)
        {
            $x[] =  $i;
        }
        return $x;
    }

    public function models(Request $request)
    {
        return $this->service->model($request->year,$request->brand);
    }

    public function fuels(Request $request)
    {
        return $this->service->fuel($request->year,$request->brand,$request->model);
    }

    public function bodys(Request $request)
    {
        return $this->service->body($request->year,$request->brand,$request->model);
    }

    public function versions(Request $request)
    {
        return $this->service->version($request->year,$request->brand,$request->model,$request->body,$request->fuel);
    }

    public function colors()
    {
       return $this->service->color();
    }

    public function citys()
    {
        return $this->service->cities();
    }

    public function town(Request $request)
    {
        return $this->service->districts($request->id);
    }


    public function getversion(Request $request)
    {
       return $this->service->getversion($request->id);
     }

    public function getcar(Request $request)
    {
        return $this->service->getType($request->type,$request->limit);

    }

    public function onlymodel(Request $request)
    {
        return $this->service->onlymodel($request->brand_id);

    }


}