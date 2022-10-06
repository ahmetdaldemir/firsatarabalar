<?php namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarBuyRequest;
use App\Models\CustomerCarFollow;
use App\Repositories\Affiliates\AffiliateRepositoryInterface;
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
    protected AffiliateRepositoryInterface $AffiliateRepository;

    public function __construct(CarRepositoryInterface $CarRepository, CustomerCarInterface $CustomerCarRepository, AffiliateRepositoryInterface $AffiliateRepository)
    {
        $this->service = new Make();
        $this->CarRepository = $CarRepository;
        $this->CustomerCarRepository = $CustomerCarRepository;
        $this->AffiliateRepository = $AffiliateRepository;
    }


    public function profil()
    {
        $data['profil'] = Auth::guard('customer')->user();
        return view('account/profil', $data);
    }

    public function sellerpage(Request $request)
    {
        $data['profil'] = Auth::guard('customer')->user();
        $data['customer_car'] = CustomerCar::find($request->id);
        return view('account/sellerpage', $data);
    }


    public function payment()
    {
        return view('account/payment');
    }



    public function tender()
    {
        return view('account/tender');
    }



    public function buy()
    {
        $data['buys'] = CustomerCarBuyRequest::where('customer_id', Auth::guard('customer')->id())->get();
        return view('account/buy', $data);
    }


    public function follow()
    {
        $data['follows'] = CustomerCarFollow::where('customer_id', Auth::guard('customer')->id())->get();
        return view('account/follow', $data);
    }


    public function car()
    {
        $data['cars'] = CustomerCar::where('customer_id',Auth::guard('customer')->id())->get();
        return view('account/cars', $data);
    }


    public function affiliate()
    {
        return view('account/affiliate');
    }

    public function affiliateSave(Request $request)
    {
        $response = $this->AffiliateRepository->create($request);
        return response()->json(['success' => $response['status'], 'message' => $response['message']], 200);
    }

    public function affiliates()
    {
        return response()->json(['success' => "true", 'data' => $this->AffiliateRepository->get()], 200);
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
        if (!Auth::guard('customer')->check()) {
            return response()->json(['success' => false, 'message' => "Lütfen kullanıcı girişi yapınız yada üye olunuz"], 200);
        }

        $customer_car_follow = CustomerCarFollow::where('customer_id', Auth::guard('customer')->id())->where('customer_car_id', $request->customer_car_id)->first();
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
        $customer_car_follow_new = CustomerCarFollow::where('customer_id', Auth::guard('customer')->id())->where('id', $request->follow_id)->first();
        if ($customer_car_follow_new) {
            $customer_car_follow_new->delete();
            return response()->json(['success' => false, 'message' => "Araç favorilerimden çıkartıldı."], 200);
        }
        return response()->json(['success' => false, 'message' => "Favori Bulunamadı."], 200);
    }

    public function customer_car_id_buy(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['success' => false, 'message' => "Lütfen kullanıcı girişi yapınız yada üye olunuz"], 200);
        }

        $customer_car_buy = CustomerCarBuyRequest::where('customer_id', Auth::guard('customer')->id())->where('customer_car_id', $request->customer_car_id)->first();
        if ($customer_car_buy) {
            return response()->json(['success' => false, 'message' => "Daha Önce Taleb Verilmiştir"], 200);
        }

        $customer_car = CustomerCar::find($request->customer_car_id);
        if ($customer_car->status != 5) {
            return response()->json(['success' => false, 'message' => "Araça talep verilemez"], 200);
        }

        $customer_car_buy_new = new CustomerCarBuyRequest();
        $customer_car_buy_new->customer_car_id = $request->customer_car_id;
        $customer_car_buy_new->customer_id = Auth::guard('customer')->id();
        $customer_car_buy_new->save();
        return response()->json(['success' => false, 'message' => "Araç alım talebi gönderildi."], 200);
    }

    public function customer_car_buy_request_delete(Request $request)
    {
        $customer_car_buy_new = CustomerCarBuyRequest::where('customer_id', Auth::guard('customer')->id())->first();
        if ($customer_car_buy_new) {
            $customer_car_buy_new->delete();
            return response()->json(['success' => false, 'message' => "Araç Listeden çıkartıldı."], 200);
        }
        return response()->json(['success' => false, 'message' => "Alım Talebi Verilen Araç Bulunamadı."], 200);
    }


}