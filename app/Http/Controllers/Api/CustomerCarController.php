<?php namespace App\Http\Controllers\Api;

use App\Enums\BodyType;
use App\Enums\DateEnum;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\CustomerCar;
use App\Models\CustomerCarValuation;
use App\Models\District;
use App\Models\Town;
use App\Repositories\Customers\CustomerRepositoryInterface;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerCarController extends Controller
{
    private CustomerRepositoryInterface $CustomerRepository;
    protected $upload;

    public function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
        $this->upload = new Upload();
        $this->CustomerRepository = $CustomerRepository;
    }

    public function form2(Request $request)
    {
        $data['customer_car_id'] = $this->customerCarRepository->firstStepStore($request);
    }


    public function form3(Request $request)
    {
        $data['customer_car_id'] = $this->customerCarRepository->secondStepStore($request);
    }

    public function form4(Request $request)
    {
        $data['customer_car_id'] = $this->customerCarRepository->thirtyStepStore($request);
    }

    public function form5()
    {
        $data['chart'] = [];
    }

    public function imageUpload(Request $request)
    {
        $image = [];
       $x = $this->upload->index($request->files->all()['image']);
       // $request->file('image')->store('images');
        return response()->json(['success' => $this->upload->getFileName()],200);
    }


    public function customer_car_valuation_confirm(Request $request)
    {
        $customer_car_id = CustomerCar::where('customer_id', $request->customer_id)->where('id', $request->customer_car_id)->first();
        if($customer_car_id || $customer_car_id == 3)
        {
            $customer_car_id->status = $request->status;
            if($request->status == 4)
            {
                $customer_car_id->is_confirm = 1;
            }
            $customer_car_id->save();
        }

        return response()->json(['success' => true, 'message' => "İşlem Yapıldı!"], 200);
    }

    public function customer_car_valuation(Request $request)
    {
        $arrayR = "";
        Log::info($request);
        $customer_car_valuation = CustomerCarValuation::where('customer_car_id',$request->customer_car_id)->first();
        if($customer_car_valuation)
        {
            $arrayR = array(
                'plate' => $customer_car_valuation->customer_car->plate,
                'brand' => $customer_car_valuation->customer_car->brand_name,
                'model' => $customer_car_valuation->customer_car->model,
                'comment' => $customer_car_valuation->comment,
                'link1' => $customer_car_valuation->link1,
                'link1_comment' => $customer_car_valuation->link1_comment,
                'link2' => $customer_car_valuation->link1,
                'link2_comment' => $customer_car_valuation->link1_comment,
                'link3' => $customer_car_valuation->link1,
                'link3_comment' => $customer_car_valuation->link1_comment,
                'link4' => $customer_car_valuation->link1,
                'link4_comment' => $customer_car_valuation->link1_comment,
                'link4' => $customer_car_valuation->link1,
                'link5_comment' => $customer_car_valuation->link1_comment,
                'offer_price' => $customer_car_valuation->offer_price
            );
        }
        return response()->json($arrayR, 200);
    }


}