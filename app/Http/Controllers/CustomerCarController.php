<?php

namespace App\Http\Controllers;


use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Models\Brand;
use App\Models\CustomerCar;
use App\Models\CustomerCarValuation;
use App\Models\Page;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Services\Make;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function confirm()
    {
        $data['chart'] = [];
        $data['kvkk'] = Page::find('3');
        $data['agreement'] = Page::find('10');
        $data['customer_car'] = $this->customer_car_control(1);
        return view('view.car.confirm', $data);
    }


    public function form1(Request $request)
    {
        if ($request->status == 0) {
            if (!is_null($request->is_data) || $request->is_data != '0') {
                $this->customerCarRepository->delete($request->is_data);
                $data['customer_car'] = $this->customer_car_control(1);
            }
        } else {
            $data['customer_car'] = $this->customer_car_control(1);
        }
        $data['chart'] = [];
        $data['brands'] = $this->service->brands();
        $data['colors'] = $this->service->color();
        $data['cities'] = $this->service->cities();
        $data['bodytype'] = BodyType::BodyType;
        $data['fueltype'] = FullType::FullType;
        $data['transmission'] = Transmission::Transmission;

        return view('view.car.form1', $data);
    }


    public function form2(Request $request)
    {
        if ($request->request != null) {
            $data['customer_car_id'] = $this->customerCarRepository->firstStepStore($request);
        }
        /*
        $data['customer_car'] =  $this->customer_car_control(2);
        if($data['customer_car'] == false)
        {
            return redirect()->to('form1');
        }
        */
        $data['customer_car'] = null;
        return view('view.car.form2', $data);
    }


    public function form3(Request $request)
    {
        if ($request->request != null) {
            $data['customer_car_id'] = $this->customerCarRepository->secondStepStore($request);
        }
        /*
        $data['customer_car'] =  $this->customer_car_control(2);

         if($data['customer_car'] == false)
         {
             return redirect()->to('form1');
         }
         */
        $data['customer_car'] = null;
        return view('view.car.form3', $data);
    }

    public function form4(Request $request)
    {
        if ($request->request != null) {
            $data['customer_car_id'] = $this->customerCarRepository->thirtyStepStore($request);
        }
        /*
         $data['customer_car'] =  $this->customer_car_control(3);
          if($data['customer_car'] == false)
          {
              return redirect()->to('form1');
          }
          */
        $data['customer_car'] = null;
        return view('view.car.form4', $data);
    }

    public function form5(Request $request)
    {
        $data['chart'] = [];
        $data['customer_car'] = CustomerCar::where('id', $request->customer_car_id)->first();
        $data['customer_car_id'] = $request->customer_car_id;
        return view('view.car.form5', $data);
    }

    public function customer_car_control($step)
    {
        $customer_car = CustomerCar::where('customer_id', Auth::guard('customer')->id())->first();
        if (!$customer_car) {
            return false;
        }
        if ($customer_car)// TODO : Bu alan silinecek
        {
            $this->customerCarRepository->delete($customer_car->id);
        }
        return false; // TODO : Bu alan silinecek
        //  return $customer_car;
    }

    public function dropzoneStore(Request $request)
    {
        $x = $this->upload->index($request->file('file'),"cars");
        /*$image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);*/
        $this->customerCarRepository->fourth($this->upload->getFileName(),$request);
        return response()->json(['success' => $x]);
    }

    public function customer_car_valuation_confirm(Request $request)
    {
        $uuid = base64_decode($request->token);
        $customer_car_valuation = CustomerCarValuation::where('uuid', $uuid)->first();
        $customer_car_id = CustomerCar::find($customer_car_valuation->customer_car_id);

        if ($customer_car_id || $customer_car_id == 3) {
            if ($customer_car_valuation) {
                $customer_car_valuation->is_confirm = 1;
                if ($request->status == 4) {
                    $status = 1;
                } else {
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