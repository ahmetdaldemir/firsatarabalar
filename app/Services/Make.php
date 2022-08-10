<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Town;
use Illuminate\Support\Facades\Cache;

class Make
{


    public function brands()
    {
        $cache_key = 'brand';
        if (Cache::has($cache_key)) {
            $data =  Cache::get($cache_key);
        } else {
            $brand = Brand::all();
            $data = Cache::put($cache_key,$brand);
        }
        return $data;
    }

    public function model($id)
    {
        $cache_key = 'model:' . $id;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Car::where('brand_id', $id)->get();
            Cache::put($cache_key, $data);
        }
         return $data;
    }

    public function color()
    {
        $cache_key = 'color';
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Color::all();
            Cache::put($cache_key, $data);
        }
        return $data;
    }

    public function cities()
    {
        $cache_key = 'cities';
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = City::all();
            Cache::put($cache_key, $data);
        }
        return $data;
    }

    public function districts($id)
    {
        $cache_key = 'district:'.$id;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Town::where('city_id', $id)->get();
            Cache::put($cache_key, $data);
        }
        return $data;
    }
}