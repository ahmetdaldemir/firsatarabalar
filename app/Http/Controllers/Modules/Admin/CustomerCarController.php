<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\CustomerCarStatus;
use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\carRequest;
use App\Jobs\CustomerCarValuationPdf;
use App\Models\CustomerCar;
use App\Models\CustomerCarBuyRequest;
use App\Models\CustomerCarComment;
use App\Models\CustomerCarPaymentTransaction;
use App\Models\CustomerCarPhoto;
use App\Models\CustomerCarValuation;
use App\Models\User;
use App\Models\UserEarning;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Repositories\Users\UserRepositoryInterface;
use App\Services\Make;
use App\Services\Sms;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CustomerCarController extends Controller
{
    private CustomerCarInterface $CustomerCar;
    protected $now;
    protected $customer_car_status;
    protected $sms;
    private CityRepositoryInterface $CityRepository;

    public function __construct(CustomerCarInterface $CustomerCar, UserRepositoryInterface $UserRepository, CityRepositoryInterface $CityRepository)
    {
        $this->CustomerCar = $CustomerCar;
        $this->UserRepository = $UserRepository;
        $this->now = Carbon::now();
        $this->CityRepository = $CityRepository;

    }

    public function index(Request $request)
    {
        $data['show'] = "";
        $data['customer_car_valuations'] = $this->CustomerCar->get($request);
        $data['years'] = DateEnum::Years;
        $data['experts'] = $this->UserRepository->getExpert();
        $data['mounth'] = $this->now->month;
        $data['this_year'] = $this->now->year;
        $data['status'] = CustomerCarStatus::Status;
        $data['customers'] = Make::customers();
        $data['searchroute'] = 'admin.customer_car_valuation.index';
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
        $data['requests'] = CustomerCarBuyRequest::where('customer_car_id',$request->id)->orderBy('id','asc');
        $data['valuation'] = $this->CustomerCar->getByValuationCustomerId($request->id);
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

    public function payments()
    {
        $data['searchroute'] = 'admin.payments';
        $data['payments'] = CustomerCarPaymentTransaction::all();
        return view('admin.car.payments', $data);
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
        if ($check == 0) {
            $this->CustomerCar->assignmentDo($request);
            $customer_car = $this->CustomerCar->getById($request->customer_car_id);
            $message = mb_strtoupper($customer_car->plate) . " Plakali aracin atamasi yapilmistir. En kisa surede arac degerlemesine baslayiniz.";
            $requesta['message'] =  $message;
            $requesta['phone']   =  $customer_car->expert->phone;
            $sms = new Sms($requesta);
            $this->CustomerCar->status($request, CustomerCarStatus::STATUS_STRING['VALUATION']);
            $this->CustomerCar->statusLog($request, CustomerCarStatus::STATUS_STRING['VALUATION']);
            return response()->json("Atama Başarılı", Response::HTTP_OK);
        }
        return response()->json($check, 200);
    }

    public function store_valuation(Request $request)
    {

        $valuation = CustomerCarValuation::updateOrCreate(
            ['customer_car_id' => $request->customers_car_id],
            [
                'uuid' => Str::uuid(),
                'comment' => $request->comment,
                'link1' => $request->link1,
                'link1_comment ' => $request->link1_comment,
                'link2' => $request->link2,
                'link2_comment' => $request->link2_comment,
                'link3' => $request->link3,
                'link3_comment' => $request->link3_comment,
                'link4' => $request->link4,
                'link4_comment' => $request->link4_comment,
                'link5' => $request->link5,
                'link5_comment' => $request->link5_comment,
                'offer_price' => $request->offer_price,
                'earning' => User::find(Auth::id())->earn,
                'is_confirm' => 0,
                'status' => 1,
            ]
        );


        $customerCar = $this->CustomerCar->getById($request->customers_car_id);
      //  $this->dispatch(new CustomerCarValuationPdf($customerCar));

        $customer_car = CustomerCar::find($request->customers_car_id);
        Log::info($customer_car);
        $customer_car->status = 3;
        $customer_car->save();

        Log::info(Auth::guard('web')->id());
        $valuation = UserEarning::updateOrCreate(
            ['customer_car_id' => $request->customers_car_id],
            [
                'user_id' => Auth::guard('web')->id(),
                'customers_car_id' => $request->customers_car_id,
                'valuation_id' => $valuation->id,
                'earning ' => User::find(Auth::id())->earn,
                'comments' => $request->comments,
                'status' => 'new',
            ]
        );

    }


    public function store_comment(Request $request)
    {
        $customer_car_commment = new CustomerCarComment();
        $customer_car_commment->customer_car_id = $request->car_id;
        $customer_car_commment->comment = $request->comment;
        $customer_car_commment->user_id = Auth::guard('web')->id();
        $customer_car_commment->save();
    }

    public function delete_commnet(Request $request)
    {
        $customer_car_commment = CustomerCarComment::find($request->id);
        $customer_car_commment->delete();
        return redirect()->back();
    }

    public function default_photo(Request $request)
    {
        $customer_car = CustomerCar::find($request->id);
        $customer_car_photo = CustomerCarPhoto::find($request->photo);
        $customer_car->default_image = $customer_car_photo->image;
        $customer_car->save();
        return redirect()->back();
    }

    public function customer_car_valuation_sms(Request $request)
    {
        $customer_car_valuation = CustomerCarValuation::find($request->id);
        $customer = $customer_car_valuation->customer_car->customer;
        $message = mb_strtoupper($customer_car_valuation->customer_car->plate) . " Plakali aracinızn değerlemesi yapilmistir. <a href='firsatrabalar.com/pdf?id =".$request->id."'";
        $requesta['message'] =  $message;
        $requesta['phone']   =  $customer->phone;
        $this->dispatch(new Sms($requesta));
        $customer_car_valuation->date_sendconfirm = date('Y-m-d');
        $customer_car_valuation->save();
        redirect()->back();
    }
}