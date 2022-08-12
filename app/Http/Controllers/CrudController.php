<?php

namespace App\Http\Controllers;


use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Http\Requests\VehiclePostRequest;
use App\Jobs\SendEmailJob;
use App\Models\Brand;
use App\Models\VehicleRequest;
use App\Repositories\Cars\CarRepositoryInterface;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Services\Make;
use Illuminate\Http\Request;
use Redis;

class CrudController extends Controller
{
    protected $service;
    private CarRepositoryInterface $CarRepository;
    private CustomerCarInterface $CustomerCarRepository;

    public function __construct(CarRepositoryInterface $CarRepository,CustomerCarInterface $CustomerCarRepository)
    {
        $this->service = new Make();
        $this->CarRepository = $CarRepository;
        $this->CustomerCarRepository = $CustomerCarRepository;
    }


    public function vehiclerequest(VehiclePostRequest $request)
    {
        $request->validated();


        $vehicle = new VehicleRequest();
        $vehicle->brand_id = $request->brand_id;
        $vehicle->version = $request->version;
        $vehicle->customer_id = $request->customer_id;
        $vehicle->price_min = $request->price_min;
        $vehicle->price_max = $request->price_max;
        $vehicle->message = $request->message;
        $vehicle->save();

        dispatch(new SendEmailJob($vehicle));

    }

    public function getversion(Request $request)
    {
         $version = $this->CarRepository->version_filter($request->id);
         return response()->json($version,200);
    }

    public function getcar(Request $request)
    {
        $cars = $this->CustomerCarRepository->getType($request->type);
        return response()->json($cars,200);
    }

    public function getbody(Request $request)
    {
        $body = $this->service->body($request->year,$request->brand,$request->model);
        return response()->json($body,200);
    }

    public function getfuel(Request $request)
    {
        $fuel = $this->service->fuel($request->year,$request->brand,$request->model);
        return response()->json($fuel,200);
    }

    public function getversionlist(Request $request)
    {
        $fuel = $this->service->version($request->year,$request->brand,$request->model,$request->body,$request->fuel);
        return response()->json($fuel,200);
    }



}