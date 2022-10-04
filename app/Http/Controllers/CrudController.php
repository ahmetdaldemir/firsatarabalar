<?php

namespace App\Http\Controllers;


use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Http\Requests\VehiclePostRequest;
use App\Jobs\SendEmailJob;
use App\Mail\SiteMail;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Town;
use App\Models\VehicleRequest;
use App\Repositories\Cars\CarRepositoryInterface;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Services\Make;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Redis;

class CrudController extends Controller
{
    protected $service;
    private CarRepositoryInterface $CarRepository;
    private CustomerCarInterface $CustomerCarRepository;

    public function __construct(CarRepositoryInterface $CarRepository, CustomerCarInterface $CustomerCarRepository)
    {
        $this->service = new Make();
        $this->CarRepository = $CarRepository;
        $this->CustomerCarRepository = $CustomerCarRepository;
    }


    public function vehiclerequest(VehiclePostRequest $request)
    {
        $request->validated();

        $vehicleget = VehicleRequest::where('customer_id',$request->customer_id)->where('status',0)->first();
        if($vehicleget)
        {
            return response()->json([
                'error' => 'Daha önce talebiniz bulunmaktadır',
             ],200);
        }

        Log::info($request);
        $vehicle = new VehicleRequest();
        $vehicle->brand_id = $request->brand_id;
        $vehicle->model = $request->model;
        $vehicle->body_type_id = $request->body_type_id;
        $vehicle->gear_id = $request->gear_id;
        $vehicle->customer_id = $request->customer_id;
        $vehicle->price_min = $request->price_min;
        $vehicle->price_max = $request->price_max;
        $vehicle->request_time = $request->request_time;
        $vehicle->save();
        dispatch(new SendEmailJob($vehicle));
    }

    public function getversion(Request $request)
    {
        $version = $this->CarRepository->version_filter($request->id);
        return response()->json($version, 200);
    }

    public function getcar(Request $request)
    {
        $cars = $this->CustomerCarRepository->getType($request->type);
        return response()->json($cars, 200);
    }

    public function getbody(Request $request)
    {
        $body = $this->service->body($request->year, $request->brand, $request->model);
        return response()->json($body, 200);
    }

    public function getfuel(Request $request)
    {
        $fuel = $this->service->fuel($request->year, $request->brand, $request->model);
        return response()->json($fuel, 200);
    }

    public function getversionlist(Request $request)
    {
        $fuel = $this->service->version($request->year, $request->brand, $request->model);
        return response()->json($fuel, 200);
    }


    public function car_selection(Request $request)
    {
        $m = $request->m;
        if ($m == "build.years") {

            $brand_id = $request->brand_id;

            $MinY = Car::select('production_start')->where('brand_id',$brand_id)->orderBy('production_start','asc')->first();
            $MaxY = Car::select('production_end')->where('brand_id',$brand_id)->orderBy('production_end','desc')->first();


            $years = [];

            for ($i = $MinY->production_start; $i <= $MaxY->production_end; $i++) {
                $years[] = $i;
            }

            rsort($years);

            $output = [
                "status" => "success",
                "message" => "Years builded.",
                "data" => $years
            ];

        } else if ($m == "build.models") {

            $brand_id = $request->brand_id;
            $year = $request->year;

            $ModelsQuery = Car::select('model')->where('brand_id',$brand_id)->where('production_start','<=',$year)->where('production_end','>=',$year)->groupBy('model')->orderBy('model','asc')->get();

            $models = [];

            $models[] = "Modeli Bulamadım";

            foreach ($ModelsQuery as $Model) {
                $models[] = $Model->model;
            }

            $output = [
                "status" => "success",
                "message" => "Models builded.",
                "data" => $models
            ];

        } else if ($m == "build.body") {

            $BodyTypes = [];
            $_tmp = BodyType::BodyType;
            foreach ($_tmp as $key=>$val) {
                $BodyTypes[$key] = $val;
            }

            $brand_id = $request->brand_id;
            $year =  $request->year;
            $model =  $request->model;

            $BodyQuery = Car::select('bodytype')->where('brand_id',$brand_id)->where('production_start','<=',$year)->where('production_end','>=',$year)->where('model',$model)->groupBy('bodytype')->orderBy('bodytype')->get();

            $bodys = [];

            foreach ($BodyQuery as $Body) {
                $bodys[] = ["id" => $Body->bodytype, "text" => $BodyTypes[$Body->bodytype]];
            }

            $output = [
                "status" => "success",
                "message" => "Bodys builded.",
                "data" => $bodys
            ];

        } else if ($m == "build.fuel") {

            $FuelTypes = [];
            $_tmp = FullType::FullType;;
            foreach ($_tmp as $key => $val) {
                $FuelTypes[$key] = $val;
            }

            $brand_id = $request->brand_id;
            $year =     $request->year;
            $model =    $request->model;
            $bodytype = $request->bodytype;

            $Query = Car::select('fueltype')->where('brand_id',$brand_id)->where('production_start','<=',$year)->where('production_end','>=',$year)->where('model',$model)->where('bodytype',$bodytype)->groupBy('fueltype')->orderBy('fueltype')->get();
            $fuels = [];

            foreach ($Query as $Item) {
                $fuels[] = ["id" => $Item->fueltype, "text" => $FuelTypes[$Item->fueltype]];
                if ($Item->fueltype == 1) {
                    $fuels[] = ["id" => 3, "text" => $FuelTypes[3]];
                }
            }

            $output = [
                "status" => "success",
                "message" => "Fuels builded.",
                "data" => $fuels
            ];

        } else if ($m == "build.gear") {

            $TransmissionTypes = [];
            $_tmp = Transmission::Transmission;
            foreach ($_tmp as $key => $val) {
                $TransmissionTypes[$key] = $val;
            }

            $brand_id = $request->brand_id;
            $year =     $request->year;
            $model =    $request->model;
            $bodytype = $request->bodytype;
            $fuel = ($request->fuel == 3) ? 1 : $request->fuel;

            $Query = Car::select('transmission')->where('brand_id',$brand_id)->where('production_start','<=',$year)->where('production_end','>=',$year)->where('model',$model)->where('bodytype',$bodytype)->where('fueltype',$fuel)->groupBy('transmission')->orderBy('transmission')->get();
            $gears = [];

            foreach ($Query as $Item) {
                $gears[] = ["id" => $Item->transmission, "text" => $TransmissionTypes[$Item->transmission]];
            }

            $output = [
                "status" => "success",
                "message" => "Gears builded.",
                "data" => $gears
            ];

        } else if ($m == "build.version") {

            $brand_id = $request->brand_id;
            $year =     $request->year;
            $model =    $request->model;
            $bodytype = $request->bodytype;
            $fuel = ($request->fuel == 3) ? 1 : $request->fuel;
            $gear = $request->gear;

            $Query = Car::where('brand_id',$brand_id)->where('production_start','<=',$year)->where('production_end','>=',$year)->where('model',$model)->where('bodytype',$bodytype)->where('fueltype',$fuel)->where('transmission',$gear)->get();
            $versions = [];

            foreach ($Query as $Item) {
                $versions[] = ["id" => $Item->id, "text" => $Item->name . " " . $Item->horse . "HP ({$Item->production_start} - {$Item->production_end})"];
            }

            $output = [
                "status" => "success",
                "message" => "Versions builded.",
                "data" => $versions
            ];

        } else if ($m == "build.body-fuel-gear") {

            $BodyTypes = [];
            $_tmp = BodyType::BodyType;
            foreach ($_tmp as $key =>  $val) {
                $BodyTypes[$key] = $val;
            }

            $BodyQuery = Car::select('bodytype')->groupBy('bodytype')->orderBy('bodytype')->get();

            $bodys = [];
            foreach ($BodyQuery as $Body) {
                $bodys[] = ["id" => $Body->bodytype, "text" => $BodyTypes[$Body->bodytype]];
            }

            // --

            $FuelTypes = [];
            $_tmp = FullType::FullType;
            foreach ($_tmp as $key => $val) {
                $FuelTypes[$key] = $val;
            }

            $Query = Car::select('fueltype')->orderBy('fueltype')->groupBy('fueltype')->get();

            $fuels = [];
            foreach ($Query as $Item) {
                $fuels[] = ["id" => $Item->fueltype, "text" => $FuelTypes[$Item->fueltype]];
                if ($Item->fueltype == 1) {
                    $fuels[] = ["id" => 3, "text" => $FuelTypes[3]];
                }
            }

            // --

            $TransmissionTypes = [];
            $_tmp = Transmission::Transmission;
            foreach ($_tmp as $key => $val) {
                $TransmissionTypes[$key] = $val;
            }

            $Query = Car::select('transmission')->orderBy('transmission')->groupBy('transmission')->get();

            $gears = [];
            foreach ($Query as $Item) {
                $gears[] = ["id" => $Item->transmission, "text" => $TransmissionTypes[$Item->transmission]];
            }

            // --

            $output = [
                "status" => "success",
                "message" => "Gears builded.",
                "data" => [
                    "bodys" => $bodys,
                    "fuels" => $fuels,
                    "gears" => $gears,
                ]
            ];

        }

        echo json_encode($output, JSON_PRETTY_PRINT);
        exit;
    }

    public function states(Request $request)
    {
        $city = $request->city;
        $states = Town::where("city_id",$city)->orderBy("id", "ASC")->get();
        echo json_encode(["status"=>"success", "data"=>$states]);

    }


    public function caronlymodel(Request $request)
    {
        $brand = $request->brand_id;
        $car = Car::select('model')->where('brand_id',$brand)->distinct()->get();
        echo json_encode(["status"=>"success", "data"=>$car]);
    }


    public function mailsend(Request $request)
    {
        $data = [
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message
        ];
        Mail::to("info@firsatarabalar.com")->send(new SiteMail($data));
    }
}