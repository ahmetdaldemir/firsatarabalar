<?php

namespace App\Services;

use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Tramer;
use App\Enums\Transmission;
use App\Models\Brand;
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarFollow;
use App\Models\CustomerCarPhoto;
use App\Models\District;
use App\Models\Page;
use App\Models\Review;
use App\Models\Town;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Make
{

    public static  function customers()
    {
        $cache_key = 'customers';
        if (Cache::has($cache_key)) {
            $data = Cache::get($cache_key);
        } else {
            $brand = Customer::all()->sortBy('id');
            $data = Cache::put($cache_key, $brand);
        }
        return $data;
    }

    public function brands()
    {
        $cache_key = 'brand';
        if (Cache::has($cache_key)) {
            $data = Cache::get($cache_key);
        } else {
            $brand = Brand::all()->sortBy('name');
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

    public function onlymodel($brand)
    {
        $array = [];
        $cache_key = 'onlymodel:' . $brand;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Car::select('model')->where('brand_id', $brand)->get();
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

    public function version($year, $brand, $model)
    {

        $array = [];
        $cache_key = 'name:' . $year . ":" . $brand;
        $data = Cache::get($cache_key);
        if (!Cache::has($cache_key)) {
            $data = Car::select('id', 'name')->where('brand_id', $brand)->where('model', $model)->where('production_start', '<=', $year)->where('production_end', '>=', $year)->get();
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


    public function blogs()
    {
        $cache_key = 'blog';
        if (Cache::has($cache_key)) {
            $data = Cache::get($cache_key);
        } else {
            $brand = Page::where('categories', 'diger')->where('type', 'blog')->get();
            $data = Cache::put($cache_key, $brand);
        }
        return $data;
    }


    public function reviews()
    {

        $cache_key = 'review';
        if (Cache::has($cache_key)) {
            $data = Cache::get($cache_key);
        } else {
            $review = Review::where('status', '1')->get()->take(setting('pagination_item'));
            $data = Cache::put($cache_key, $review);
        }
        return $data;
    }

    public function getversion($id)
    {
        return Car::where('brand_id', $id)->distinct()->get(['name']);
    }


    public function pages()
    {
        $array = [];
        $pages =  Page::select('title','content','images','slug','id')->get();
        foreach ($pages as $val)
        {
            $array[] = array(
                'title' =>$val->title,
                'content' => strip_tags($val->content),
                'images' => $val->images,
                'slug' => $val->slug,
                'id' => $val->id,
            );
        }

        return $array;
    }


    public function getType($type, $limit)
    {
        $arrray = [];
        if($limit>0)
        {
            $customer_cars = CustomerCar::where('status', $type)->get()->take($limit);
        }else{
            $customer_cars = CustomerCar::where('status', $type)->get()->take(setting('pagination_item'));
        }
        foreach ($customer_cars as $customer_car) {

            $images = $customer_car->photo;

            if($type == 5 || $type == 6)
            {
                $price = number_format($customer_car->gal_price_1, 2, ',', '.');
            }else{
                $price = null;
            }
            $arrray[] = array(
                'id' => $customer_car->id,
                'name' => 'Mercedes edition 1 amg paket',
                'version' => '1.5 TSI ACT Business DSG',
                'image' => $customer_car->default_image,
                'images' =>$images,
                'tab1' => [
                    "km" => $customer_car->km,
                    "modelyili" => $customer_car->caryear,
                    "kasatipi" => BodyType::BodyType[$customer_car->body] ?? NULL,
                    "motorcc" => $customer_car->car->horse,
                    "motorhacmi" => $customer_car->car->engine,
                    "gear" => Transmission::Transmission[$customer_car->gear]?? NULL,
                    "fuel" => FullType::FullType[$customer_car->fuel]?? NULL,
                    "tramer" => Tramer::Tramer[$customer_car->tramer],
                ],
                'tab2' => [
                    'a01' => ($customer_car->status_frame == 1) ? "Var" : "Yok",
                    'a02' => ($customer_car->status_pole == 1) ? "Var" : "Yok",
                    'a03' => ($customer_car->status_podium == 1) ? "Var" : "Yok",
                    'a04' => ($customer_car->status_airbag == 1) ? "Var" : "Yok",
                    'a05' => ($customer_car->status_triger == 1) ? "Var" : "Yok",
                    'a06' => ($customer_car->status_oppression == 1) ? "Var" : "Yok",
                    'a07' => ($customer_car->status_brake == 1) ? "Var" : "Yok",
                    'a08' => ($customer_car->status_tyre == 1) ? "Var" : "Yok",
                    'a09' => ($customer_car->status_km == 1) ? "Var" : "Yok",
                    'a10' => ($customer_car->status_unrealizable == 1) ? "Var" : "Yok",
                    'a11' => ($customer_car->status_onArkaBagaj == 1) ? "Var" : "Yok",
                ],
                'tab3' => [
                    'a12' =>  $customer_car->car_notwork,
                    'a13' => $customer_car->car_details,
                    'a14' => $customer_car->car_interior_faults,
                    'a15' => $customer_car->car_exterior_faults,
                    'a16' => $customer_car->maintenance_history,
                    'a17' => $customer_car->ownorder,
                    'a18' => City::find($customer_car->car_city)->name ?? NULL,
                    'a19' =>  Town::find($customer_car->car_state)->name ?? NULL,
                ],
                'brand' => $customer_car->car->brand->name,
                'model' => $customer_car->car->model,
                'desc' => $customer_car->description,
                'price' => $price,
                'sale' => true,
            );
        }
        return $arrray;
    }

    public function getFollow($customer_id)
    {
        $customer_car_follows = CustomerCarFollow::where('customer_id',$customer_id)->get();
        $arrray = [];

        foreach ($customer_car_follows as $customer_car_follow) {

            $images = $customer_car_follow->customer_car->photo;



            $arrray[] = array(
                'id' => $customer_car_follow->customer_car_id,
                'name' =>"",
                'version' => $customer_car_follow->customer_car->car->name,
                'image' => $customer_car_follow->customer_car->default_image,
                'images' => $images,
                'tab1' => [
                    "km" => $customer_car_follow->customer_car->km,
                    "modelyili" => $customer_car_follow->customer_car->caryear,
                    "kasatipi" => BodyType::BodyType[$customer_car_follow->customer_car->body] ?? NULL,
                    "motorcc" => $customer_car_follow->customer_car->car->horse,
                    "motorhacmi" => $customer_car_follow->customer_car->car->engine,
                    "gear" => Transmission::Transmission[$customer_car_follow->customer_car->gear]?? NULL,
                    "fuel" => FullType::FullType[$customer_car_follow->customer_car->fuel]?? NULL,
                    "tramer" => Tramer::Tramer[$customer_car_follow->customer_car->tramer],
                ],
                'tab2' => [
                    'a01' => ($customer_car_follow->customer_car->status_frame == 1) ? "Var" : "Yok",
                    'a02' => ($customer_car_follow->customer_car->status_pole == 1) ? "Var" : "Yok",
                    'a03' => ($customer_car_follow->customer_car->status_podium == 1) ? "Var" : "Yok",
                    'a04' => ($customer_car_follow->customer_car->status_airbag == 1) ? "Var" : "Yok",
                    'a05' => ($customer_car_follow->customer_car->status_triger == 1) ? "Var" : "Yok",
                    'a06' => ($customer_car_follow->customer_car->status_oppression == 1) ? "Var" : "Yok",
                    'a07' => ($customer_car_follow->customer_car->status_brake == 1) ? "Var" : "Yok",
                    'a08' => ($customer_car_follow->customer_car->status_tyre == 1) ? "Var" : "Yok",
                    'a09' => ($customer_car_follow->customer_car->status_km == 1) ? "Var" : "Yok",
                    'a10' => ($customer_car_follow->customer_car->status_unrealizable == 1) ? "Var" : "Yok",
                    'a11' => ($customer_car_follow->customer_car->status_onArkaBagaj == 1) ? "Var" : "Yok",
                ],
                'tab3' => [
                    'a12' =>  $customer_car_follow->customer_car->car_notwork,
                    'a13' => $customer_car_follow->customer_car->car_details,
                    'a14' => $customer_car_follow->customer_car->car_interior_faults,
                    'a15' => $customer_car_follow->customer_car->car_exterior_faults,
                    'a16' => $customer_car_follow->customer_car->maintenance_history,
                    'a17' => $customer_car_follow->customer_car->ownorder,
                    'a18' => City::find($customer_car_follow->customer_car->car_city)->name ?? NULL,
                    'a19' =>  Town::find($customer_car_follow->customer_car->car_state)->name ?? NULL,
                ],
                'brand' => $customer_car_follow->customer_car->car->brand->name,
                'model' => $customer_car_follow->customer_car->car->model,
                'desc' => $customer_car_follow->customer_car->description,
                'price' => 0,
                'sale' => true,
            );
        }
        return $arrray;
    }


}