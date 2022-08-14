<?php namespace App\Http\Controllers\Api;

use App\Enums\BodyType;
use App\Enums\DateEnum;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Town;
use App\Repositories\Customers\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerCarController extends Controller
{
    private CustomerRepositoryInterface $CustomerRepository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
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

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        $this->customerCarRepository->fourth($imageName);
        return response()->json(['success'=>$imageName]);
    }



}