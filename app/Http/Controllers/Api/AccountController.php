<?php namespace App\Http\Controllers\Api;

use App\Enums\BodyType;
use App\Enums\CustomerCarStatus;
use App\Enums\FullType;
use App\Enums\Tramer;
use App\Enums\Transmission;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarBuyRequest;
use App\Models\CustomerCarExper;
use App\Models\CustomerCarFollow;
use App\Models\CustomerCarPhoto;
use App\Models\CustomerCarValuation;
use App\Repositories\Cars\CarRepositoryInterface;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Services\Make;
use App\Services\Sms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\VehicleRequest as VehicleModel;


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
        return response(['status' => true], 200);
    }

    public function password_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return response(['status' => false, 'msg' => 'Şifre Eşleşmiyor'], 200);
        }

        $customer = Customer::find($request->customer_id);
        $customer->password = bcrypt($request->password);
        $customer->save();
        return response(['status' => true], 200);
    }


    public function customer_car_id_follow(Request $request)
    {

        $customer_car = CustomerCar::find($request->customer_car_id);
        if (!$customer_car) {
            return response()->json(['success' => false, 'message' => "Araç Bulunamadı"], 200);
        }

        $customer = Customer::find($request->customer_id);
        if (!$customer) {
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
        $customer_car_follow_new->customer_id = $request->customer_id;
        $customer_car_follow_new->save();
        return response()->json(['success' => false, 'message' => "Araç takibe alındı."], 200);
    }


    public function customer_car_id_un_follow(Request $request)
    {
        $customer_car_follow_new = CustomerCarFollow::where('customer_id', $request->customer_id)->where('customer_car_id', $request->customer_car_id)->first();
        if ($customer_car_follow_new) {
            $customer_car_follow_new->delete();
            return response()->json(['success' => false, 'msg' => "Araç favorilerimden çıkartıldı."], 200);
        }
        return response()->json(['success' => false, 'message' => "Favori Bulunamadı."], 200);
    }

    public function mycars(Request $request)
    {
        $array = [];
        $data = CustomerCar::where('customer_id', $request->customer_id)->get();
        foreach ($data as $customer_car) {
            $array[] = array(
                'id' => $customer_car->id,
                'name' => 'Mercedes edition 1 amg paket',
                'version' => '1.5 TSI ACT Business DSG',
                'payment' => $customer_car->payment,
                'image' => $customer_car->default_image,
                'images' => $customer_car->photo,
                'tab1' => [
                    "km" => $customer_car->km,
                    "modelyili" => $customer_car->caryear,
                    "kasatipi" => BodyType::BodyType[$customer_car->body] ?? NULL,
                    "motorcc" => $customer_car->car->horse,
                    "motorhacmi" => $customer_car->car->engine,
                    "gear" => Transmission::Transmission[$customer_car->gear] ?? NULL,
                    "fuel" => FullType::FullType[$customer_car->fuel] ?? NULL,
                    "tramer" => Tramer::Tramer[$customer_car->tramer],
                ],
                'tab2' => [
                    'a01' => ($customer_car->status_frame == 1) ? "Var" : "Yok",
                    'a02' => ($customer_car->status_pole == 1) ? "Var" : "Yok",
                    'a03' => ($customer_car->status_podium == 1) ? "Var" : "Yok",
                    'a04' => ($customer_car->status_airbag == 1) ? "Var" : "Yok",
                    'a05' => ($customer_car->status_unrealizable == 1) ? "Var" : "Yok",
                    'a06' => ($customer_car->status_onArkaBagaj == 1) ? "Var" : "Yok",
                    'a07' => ($customer_car->status_km == 1) ? "Var" : "Yok",
                    'a08' => ($customer_car->status_tyre == 1) ? "Var" : "Yok",
                    'a09' => ($customer_car->status_km == 1) ? "Var" : "Yok",
                ],
                'tab3' => [
                    'a12' => $customer_car->car_notwork,
                    'a13' => $customer_car->car_details,
                    'a14' => $customer_car->car_interior_faults,
                    'a15' => $customer_car->car_exterior_faults,
                    'a16' => $customer_car->maintenance_history,
                    'a17' => $customer_car->ownorder,
                    'a18' => $customer_car->cities->name,
                    'a19' => $customer_car->state->name,
                ],
                'brand' => $customer_car->car->brand->name,
                'model' => $customer_car->car->model,
                'desc' => $customer_car->description,
                'price' => $customer_car->gal1_price,
                'sale' => true,
                'status' => CustomerCarStatus::Status[$customer_car->status],
                'customer_car_valuation' => CustomerCarValuation::where('customer_car_id',$customer_car->id)->count(),
                'customer_car_valuation_data' => CustomerCarValuation::where('customer_car_id',$customer_car->id)->first(),
            );
        }

        Log::info("info",$array);
        return response($array, 200);
    }

    public function letMeCar(Request $request)
    {
        Log::info($request);
        $vehicle = new VehicleModel();
        $vehicle->brand_id = $request->brand_id;
        $vehicle->model = $request->model;
        $vehicle->body_type_id = $request->body_type_id;
        $vehicle->fuel_type_id = $request->fuel_type_id;
        $vehicle->gear_id = $request->gear_id;
        $vehicle->damage_id = $request->damage_id;
        $vehicle->customer_id = $request->customer_id;
        $vehicle->price_min = $request->minPrice;
        $vehicle->price_max = $request->maxPrice;
        $vehicle->message = $request->message;
        $vehicle->save();
        // dispatch(new SendEmailJob($vehicle));

        return response(['success' => true], 200);
    }

    public function letMeCarList(Request $request)
    {
        $array = [];
        $data = VehicleModel::where('customer_id', $request->customer_id)->get();
        foreach ($data as $item) {
            $array[] = array(
                'id' => $item->id,
                'brand_id' => Brand::find($item->brand_id)->name,
                'model' => $item->model,
                'body_type_id' => BodyType::BodyType[$item->body_type_id],
                'fuel_type_id' => FullType::FullType[$item->fuel_type_id],
                'gear_id' => Transmission::Transmission[$item->gear_id],
                'damage_id' => ($item->damage_id == 1) ? "Hatasız" : (($item->damage_id == 2) ? "Tramer Olabilir" : "Farketmez"),
                'price_min' => $item->price_min,
                'price_max' => $item->price_max,
                'message' => $item->message,
            );
        }
        return response($array, 200);
    }

    public function letMeCarDelete(Request $request)
    {
        $data = VehicleModel::find($request->id);
        $data->delete();
        return response("Silindi", 200);
    }

    public function formSave(Request $request)
    {
        Log::info($request);

        $customercar = new CustomerCar();
        $customercar->customer_id = $request->customer_id;
        $customercar->caryear = $request->year;
        $customercar->body = $request->bodytypeid;
        $customercar->fuel = $request->fuelid;
        $customercar->gear = $request->gearid;
        $customercar->car_id = $request->version_id;
        $customercar->km = $request->km;
        $customercar->color = $request->color;
        $customercar->plate = $request->plaka;
        $customercar->ownorder = $request->sahip;
        $customercar->car_city = $request->city;
        $customercar->car_state = $request->town;
        $customercar->description = $request->description ?? "İçerik Hazırlanıyor";
        $customercar->damage = json_encode($request->parca);
        $customercar->tramer = $request->Tramer;
        $customercar->tramerValue = $request->TramerPrice;
        $customercar->tramer_photo = $request->tramerimage;
        $customercar->car_details = $request->ozetler['Ozet1'];
        $customercar->car_notwork = $request->ozetler['Ozet2'];
        $customercar->car_exterior_faults = $request->ozetler['Ozet3'];
        $customercar->car_interior_faults = $request->ozetler['Ozet4'];
        $customercar->maintenance_history = $request->bakim;
        $customercar->status_frame = $request->detays['value1'];
        $customercar->status_pole = $request->detays['value2'];
        $customercar->status_podium = $request->detays['value3'];
        $customercar->status_airbag = $request->detays['value4'];
        $customercar->status_unrealizable = $request->detays['value5'];
        $customercar->status_onArkaBagaj = $request->detays['value6'];
        $customercar->status_km = $request->detays['value7'];
        $customercar->status_tyre = $request->detays['value8'];
        $customercar->date_inspection = $request->Muayene;
        $customercar->save();


        $i = 1;
        foreach ($request->experImages as $experImages) {
            $image = new CustomerCarExper();
            $image->customer_car_id = $customercar->id;
            $image->image = $experImages . $i;
            $image->save();
            $i++;
        }

        $a = 1;
        foreach ($request->images as $image) {
            $customer_car_photo = new CustomerCarPhoto();
            $customer_car_photo->customer_car_id = $customercar->id;
            $customer_car_photo->image = $image . $a;
            $customer_car_photo->active = 0;
            $customer_car_photo->save();
            $a++;
        }

        return response(['success' => true], 200);
    }


    public function carBuys(Request $request)
    {
        $customercarbuyrequest = new CustomerCarBuyRequest();
        $customercarbuyrequest->customer_id = $request->customer_id;
        $customercarbuyrequest->customer_car_id = $request->customer_car_id;
        $customercarbuyrequest->save();
        return response()->json(['success' => true, 'message' => "Alım isteği Gönderildi!"], 200);
    }

    public function carBuysList(Request $request)
    {
        $data = CustomerCarBuyRequest::where('customer_id', $request->customer_id)->get();
        foreach ($data as $item) {
            $customer = Customer::find($item->customer_id);
            $array = array(
                'firstname' => private_str($customer->firstname, 1, -1),
                'lastname' => private_str($customer->lastname, 1, -1),
            );
        }
        return response($array, 200);
    }

    public function repassword(Request $request)
    {
        $customer =  Customer::where('phone',$request->phone)->first();

        if($customer)
        {
          $pass = rand(111111,999999);

          $customer->password = bcrypt($pass);
          $customer->save();

          $request['message'] = "Sayın". $customer->firstname." ".$customer->lastname. " Şifreniz Güncellenmiştir. Yeni Şifreniz :". $pass;
          $request['phone'] = $request->phone;
            $sms = new Sms($request);

        }
        return response()->json(['success' => true, 'message' => "Yeni Şifre Gönderildi!"], 200);
    }

    public function change_password(Request $request)
    {
        if($request->password != $request->password_confirmation)
        {
            return response()->json(['success' => false, 'message' => "Şifreler Eşleşmiyor!"], 200);
        }
        $customer =  Customer::find($request->customer_id);
        $customer->password = bcrypt($request->password);
        $customer->save();

        return response()->json(['success' => true, 'message' => "Şifre Güncellendi!"], 200);
    }

    public function getFollow(Request $request)
    {
        return $this->service->getFollow($request->customer_id);
    }


}