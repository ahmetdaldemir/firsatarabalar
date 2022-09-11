<?php

namespace App\Http\Controllers;


use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Tramer;
use App\Enums\Transmission;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\Page;
use App\Models\Review;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Services\Make;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController
{
    protected $service;
    protected $customerCarRepository;

    public function __construct(CustomerCarInterface $customerCarRepository)
    {
        $this->service = new Make();
        $this->customerCarRepository = $customerCarRepository;
    }


    public function index()
    {

        $data['chart'] = [];
        $data['customer_cars'] = CustomerCar::all();
        $data['brands'] = $this->service->brands();
        $data['blogs'] = $this->service->blogs();
        $data['reviews'] =  $this->service->reviews();
        $data['bodytypes'] =  BodyType::BodyType;
        $data['fueltypes'] =  FullType::FullType;
        $data['transmissions'] =  Transmission::Transmission;
        $data['tramers'] =  Tramer::Tramer;

        $data['yayinlanan_araclar'] = $this->customerCarRepository->getType(4);
        $data['gelecek_araclar']     = $this->customerCarRepository->getType(5);
        $data['satilan_araclar']    = $this->customerCarRepository->getType(6);
        return view('view.home',$data);
    }

    public function pages(Request $request)
    {
        $data['pages'] = Page::where('slug',$request->slug)->first();
        return view('view.pages',$data);
    }


    public function about(Request $request)
    {
        $data['pages'] = Page::where('slug',$request->slug)->first();
        return view('view.about',$data);
    }


    public function blog(Request $request)
    {
        $data['pages'] = Page::where('slug',$request->slug)->where('type','blog')->first();
        return view('view.blog',$data);
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

    public function car_detail(Request $request)
    {
        $data['car'] = CustomerCar::find($request->id);
        return view('view.car_detail',$data);
    }


    public function aracgetir()
    {
        $curl = curl_init();
        $where = urlencode('{
            "Year": {
                "$gte": 2021
            },
            "Make": {
                "$regex": "Acura"
            }
        }');
        curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/Carmodels_Car_Model_List?count=1&limit=10000&where=' . $where);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'X-Parse-Application-Id: niYkkZrtUcsBYnNZ8DU9iQnwJGFZ6GQE5STvwM9C', // This is your app's application id
            'X-Parse-REST-API-Key: qtl1ePdG5mEsq4TnwzxmNVbhLubMK4uYdiIclKnt' // This is your app's REST API key
        ));
        $data = json_decode(curl_exec($curl)); // Here you have the data that you need
        print_r(json_encode($data, JSON_PRETTY_PRINT));
        curl_close($curl);
    }
 }