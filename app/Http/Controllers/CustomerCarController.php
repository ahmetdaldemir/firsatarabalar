<?php

namespace App\Http\Controllers;


use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Models\Brand;
use App\Models\CustomerCar;
use App\Models\CustomerCarValuation;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Services\Make;
use App\Services\Upload;
use Illuminate\Http\Request;
use Redis;

class CustomerCarController extends Controller
{
     protected $service;
     protected $upload;
     protected $customerCarRepository;
    public function __construct(CustomerCarInterface $customerCarRepository)
    {
          $this->service = new Make();
          $this->customerCarRepository = $customerCarRepository;
          $this->upload = new Upload();
    }

    public function form1()
    {
        $data['chart'] = [];
        $data['brands'] = $this->service->brands();
        $data['colors'] = $this->service->color();
        $data['cities'] = $this->service->cities();
        $data['bodytype'] = BodyType::BodyType;
        $data['fueltype'] = FullType::FullType;
        $data['transmission'] = Transmission::Transmission;
        return view('view.car.form1',$data);
    }


    public function form2(Request $request)
    {
        $data['customer_car_id'] = $this->customerCarRepository->firstStepStore($request);
        return view('view.car.form2',$data);
    }


    public function form3(Request $request)
    {
        $data['customer_car_id'] = $this->customerCarRepository->secondStepStore($request);
        return view('view.car.form3',$data);
    }

    public function form4(Request $request)
    {
        $data['customer_car_id'] = $this->customerCarRepository->thirtyStepStore($request);
        return view('view.car.form4',$data);
    }

    public function form5()
    {
        $data['chart'] = [];
        return view('view.car.form5',$data);
    }

    public function dropzoneStore(Request $request)
    {
        $x = $this->upload->index($request->file('file'));
        /*$image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);*/
        $this->customerCarRepository->fourth($this->upload->getFileName());
        return response()->json(['success'=>$x]);
    }

    public function customer_car_valuation_confirm(Request $request)
    {
        $uuid = base64_decode($request->token);
        $customer_car_valuation = CustomerCarValuation::where('uuid',$uuid)->first();
        $customer_car_id = CustomerCar::find($customer_car_valuation->customer_car_id);

        if($customer_car_id || $customer_car_id == 3)
        {
            if($customer_car_valuation)
            {
                $customer_car_valuation->is_confirm = 1;
                if($request->status == 4)
                {
                    $status = 1;
                }else{
                    $status = 0;
                }
                $customer_car_valuation->status = $status;
                $customer_car_valuation->save();

                $customer_car_id->status = $request->status;
                $customer_car_id->save();
            }
        }


        return redirect()->to('/');
    }

 }