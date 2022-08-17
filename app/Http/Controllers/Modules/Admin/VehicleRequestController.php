<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\CustomerCarStatus;
use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\carRequest;
use App\Jobs\CustomerCarValuationPdf;
use App\Models\CustomerCar;
use App\Models\CustomerCarValuation;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\VehicleRequest\VehicleRequestRepository;
use App\Repositories\VehicleRequest\VehicleRequestRepositoryInterface;
use App\Services\Sms;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VehicleRequestController extends Controller
{
    private VehicleRequestRepositoryInterface $VehicleRequest;
    protected $now;
    protected $customer_car_status;
    protected $sms;


    public function __construct(VehicleRequestRepositoryInterface $VehicleRequest)
    {
        $this->VehicleRequest = $VehicleRequest;
        $this->now = Carbon::now();
        $this->sms = new Sms();

    }

    public function index()
    {
        $data['show'] = "";
        $data['vehicle_requests'] = $this->VehicleRequest->get();
        return view('admin.vehicle_request.index', $data);
    }

    public function deleted()
    {
        $data['show'] = "checked";
        $data['cars'] = $this->CustomerCar->deleted();
        return view('admin.car.index', $data);
    }


    public function form(Request $request)
    {
        $data['car'] = $this->CustomerCar->getById($request->id);
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = $this->CityRepository->get();
        return view('admin.customer_car_valuation.form', $data);
    }

    public function create()
    {
        $data['car'] = NULL;
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = $this->CityRepository->get();
        return view('admin.car.form', $data);
    }


    public function store(carRequest $request)
    {
        if (is_null($request->car_id)) {
            $this->CustomerCar->create($request);
        } else {
            $this->CustomerCar->update($request->car_id, $request);
        }
        return redirect()->route('admin.car.index');
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->CustomerCar->getById($id)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $data = $request->only([
            'client',
            'details'
        ]);

        return response()->json([
            'data' => $this->CustomerCar->update($id, $data)
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $this->CustomerCar->delete($id);
        return response()->json(null, Response::HTTP_OK);
    }

    public function assignmentDo(Request $request)
    {
        $check = $this->CustomerCar->checkAssingTo($request, CustomerCarStatus::STATUS_STRING['ASSINGTO']);
        if (!$check) {
            $this->CustomerCar->assignmentDo($request);
            $this->sms->sendexpertmessage($request);
            $this->CustomerCar->status($request, CustomerCarStatus::STATUS_STRING['ASSINGTO']);
            $this->CustomerCar->statusLog($request, CustomerCarStatus::STATUS_STRING['ASSINGTO']);
            return response()->json("Atama Başarılı", Response::HTTP_OK);
        }
        return response()->json("Daha Önce Atama işlemi yapılmıştır", Response::HTTP_CONFLICT);
    }

    public function store_valuation(Request $request)
    {
        $valuation = new CustomerCarValuation();
        $valuation->uuid = Str::uuid();
        $valuation->customers_car_id = $request->customers_car_id;
        $valuation->comment = $request->comment;
        $valuation->link1 = $request->link1;
        $valuation->link1_comment = $request->link1_comment;
        $valuation->link2 = $request->link2;
        $valuation->link2_comment = $request->link2_comment;
        $valuation->link3 = $request->link3;
        $valuation->link3_comment = $request->link3_comment;
        $valuation->link4 = $request->link4;
        $valuation->link4_comment = $request->link4_comment;
        $valuation->link5 = $request->link5;
        $valuation->link5_comment = $request->link5_comment;
        $valuation->offer_price = $request->offer_price;
        $valuation->earning = $request->earning;
        $valuation->date_sendconfirm = $request->date_sendconfirm;
        $valuation->date_customer_open = $request->date_customer_open;
        $valuation->date_confirm = $request->date_confirm;
        $valuation->is_confirm = $request->is_confirm;
        $valuation->status = $request->status;
        $valuation->save();

        $customerCar = $this->CustomerCar->getById($request->customers_car_id);
        $this->dispatch(new CustomerCarValuationPdf($customerCar));
    }


}