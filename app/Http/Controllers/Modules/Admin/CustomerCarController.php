<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\CustomerCarStatus;
use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\carRequest;
use App\Models\CustomerCar;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Repositories\Users\UserRepositoryInterface;
use App\Services\Sms;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerCarController extends Controller
{
    private CustomerCarInterface $CustomerCar;
    protected $now;
    protected $customer_car_status;
    protected $sms;
    private CityRepositoryInterface $CityRepository;

    public function __construct(CustomerCarInterface $CustomerCar, UserRepositoryInterface $UserRepository,CityRepositoryInterface $CityRepository)
    {
        $this->CustomerCar = $CustomerCar;
        $this->UserRepository = $UserRepository;
        $this->now = Carbon::now();
        $this->sms = new Sms();
        $this->CityRepository = $CityRepository;

    }

    public function index()
    {
        $data['show'] = "";
        $data['customer_car_valuations'] = $this->CustomerCar->get();
        $data['years'] = DateEnum::Years;
        $data['experts'] = $this->UserRepository->getExpert();
        $data['mounth'] = $this->now->month;
        $data['this_year'] = $this->now->year;
        $data['status'] = CustomerCarStatus::Status;
        return view('admin.customer_car_valuation.index', $data);
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
        if(!$check)
        {
            $this->CustomerCar->assignmentDo($request);
            $this->sms->sendexpertmessage($request);
            $this->CustomerCar->status($request, CustomerCarStatus::STATUS_STRING['ASSINGTO']);
            $this->CustomerCar->statusLog($request, CustomerCarStatus::STATUS_STRING['ASSINGTO']);
            return response()->json("Atama Başarılı", Response::HTTP_OK);
        }
        return response()->json("Daha Önce Atama işlemi yapılmıştır", Response::HTTP_CONFLICT);
    }


}