<?php

namespace App\Services;

use App\Enums\BodyType;
use App\Enums\FullType;
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
            $data = Cache::get($cache_key);
        } else {
            $brand = Brand::all();
            $data = Cache::put($cache_key, $brand);
        }
        return $data;
    }

    public function model($year, $brand)
    {
        $array = [];
        $cache_key = 'model:' . $year . ":" . $brand;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Car::select('model')->where('brand_id', $brand)->where('production_start', '<=', $year)->where('production_end', '>=', $year)->get();
            foreach ($data as $item) {
                $array[]['model'] = $item->model;
            }
            $data = collect($array)->unique()->values();
            Cache::put($cache_key, $data);
        }
        return $data;
    }

    public function fuel($year, $brand, $model)
    {
        $array = [];
        $cache_key = 'fueltype:' . $year . ":" . $brand;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Car::select('fueltype')->where('brand_id', $brand)->where('model', $model)->where('production_start', '<=', $year)->where('production_end', '>=', $year)->get();
            foreach ($data as $item) {
                $array[] = array(
                    'fueltype' => FullType::FullType[$item->fueltype],
                    'id' => $item->fueltype
                );
            }
            $data = collect($array)->unique()->values();
            Cache::put($cache_key, $data);
        }
        return $data;
    }

    public function body($year, $brand, $model)
    {

        $array = [];
        $cache_key = 'bodytype:' . $year . ":" . $brand;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Car::select('bodytype')->where('brand_id', $brand)->where('model', $model)->where('production_start', '<=', $year)->where('production_end', '>=', $year)->get();
            foreach ($data as $item) {
                $array[] = array(
                    'bodytype' => BodyType::BodyType[$item->bodytype],
                    'id' => $item->bodytype
                );
            }

            $data = collect($array)->unique()->values();
            Cache::put($cache_key, $data);
        }
        return $data;
    }

    public function version($year, $brand, $model, $body, $fuel)
    {

        $array = [];
        $cache_key = 'name:' . $year . ":" . $brand. ":" .$body. ":" .$fuel;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Car::select('id','name')->where('brand_id', $brand)->where('bodytype', $body)->where('fueltype', $fuel)->where('model', $model)->where('production_start', '<=', $year)->where('production_end', '>=', $year)->get();
            foreach ($data as $item) {
                $array[] = array(
                    'name' => $item->name,
                    'id' => $item->id
                );
             }
            $data = collect($array)->unique()->values();
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
        $cache_key = 'district:' . $id;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Town::where('city_id', $id)->get();
            Cache::put($cache_key, $data);
        }
        return $data;
    }
}