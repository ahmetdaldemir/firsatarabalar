<?php namespace App\Http\Controllers\Api;

use App\Jobs\SendEmailJob;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarFollow;
use App\Repositories\Cars\CarRepositoryInterface;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Services\Make;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
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


    public function account_update(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->back();
    }

    public function password_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors('Şifreler Eşleşmiyor');
        }

        $customer = Customer::find($request->customer_id);
        $customer->password = bcrypt($request->password);
        $customer->save();
        return redirect()->back();
    }


    public function customer_car_id_follow(Request $request)
    {

        $customer_car = CustomerCar::find($request->customer_id);
        if (!$customer_car) {
            return response()->json(['success' => false, 'message' => "Müşteri Bulunamadı"], 200);
        }

        $customer_car_follow = CustomerCarFollow::where('customer_id', $request->customer_id)->where('customer_car_id', $request->customer_car_id)->first();
        if ($customer_car_follow) {
            return response()->json(['success' => false, 'message' => "Daha Önce Takibe Alınmıştır"], 200);
        }

        $customer_car = CustomerCar::find($request->customer_car_id);
        if ($customer_car->status == 5) {
            return response()->json(['success' => false, 'message' => "Araç satışı tamamlanmıştır."], 200);
        }

        $customer_car_follow_new = new CustomerCarFollow();
        $customer_car_follow_new->customer_car_id = $request->customer_car_id;
        $customer_car_follow_new->customer_id = Auth::guard('customer')->id();
        $customer_car_follow_new->save();
        return response()->json(['success' => false, 'message' => "Araç takibe alındı."], 200);
    }


    public function customer_car_id_un_follow(Request $request)
    {
        $customer_car_follow_new = CustomerCarFollow::where('customer_id', $request->customer_id)->where('customer_car_id', $request->customer_car_id)->first();
        if ($customer_car_follow_new) {
            $customer_car_follow_new->delete();
            return response()->json(['success' => false, 'message' => "Araç favorilerimden çıkartıldı."], 200);
        }
        return response()->json(['success' => false, 'message' => "Favori Bulunamadı."], 200);
    }

    public function mycars(Request $request)
    {
        return CustomerCar::where('customer_id', $request->customer_id)->get();
    }

    public function letMeCar(Request $request)
    {
        $vehicle = new VehicleRequest();
        $vehicle->brand_id = $request->brandID;
        $vehicle->version = $request->version;
        $vehicle->customer_id = $request->customerID;
        $vehicle->price_min = $request->minPrice;
        $vehicle->price_max = $request->maxPrice;
        $vehicle->message = $request->message;
        $vehicle->save();
        dispatch(new SendEmailJob($vehicle));
    }

}