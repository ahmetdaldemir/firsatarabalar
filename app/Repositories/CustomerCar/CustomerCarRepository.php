<?php namespace App\Repositories\CustomerCar;

use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarExper;
use App\Models\CustomerCarFollow;
use App\Models\CustomerCarPhoto;
use App\Models\CustomerCarStatuHistory;
use App\Models\CustomerCarValuation;
use App\Models\User;
use App\Services\Upload;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Str;
use Spatie\Permission\Models\Role;

class CustomerCarRepository implements CustomerCarInterface
{

    protected $upload;
    protected $user;

    public function __construct()
    {
        $this->upload = new Upload();

    }

    public function get($request)
    {
        $role_id = Auth::guard('web')->user()->roles->first()->id;
        if ($role_id == 1) {
           return CustomerCar::where('status',$request->status)->where('payment',1)->orderBy('id', 'desc')->paginate(20);
        }
        return CustomerCar::where('user_id', Auth::guard('web')->id())->where('status',$request->status)->where('payment',1)->orderBy('id', 'desc')->paginate(20);
    }

    public function getDistrict($id)
    {
        return CustomerCar::where('city_id', $id)->get();
    }

    public function getById($id)
    {        $role_id = Auth::guard('web')->user()->roles->first()->id;

        if ($role_id == 1) {
            return CustomerCar::findOrFail($id);
        }
        return CustomerCar::where('user_id', Auth::guard('web')->id())->where('id', $id)->first();
    }

    public function getByValuationCustomerId($id)
    {
        return CustomerCarValuation::where('customer_car_id', $id)->first();

    }

    public function delete($id)
    {
        if($id != 0)
        {
             $x = CustomerCar::where('id',$id)->where('laststep','!=',5)->first();
             if($x)
             {
                 $x->delete();
             }
        }
    }

    public function create($request)
    {
        $customer_car_valuation = new CustomerCar();
        $customer_car_valuation->uuid = Str::uuid();
        $customer_car_valuation->customers_car_id = $request->customers_car_id;
        $customer_car_valuation->comment = $request->comment;
        $customer_car_valuation->link1 = $request->link1;
        $customer_car_valuation->link1_comment = $request->link1_comment;
        $customer_car_valuation->link2 = $request->link2;
        $customer_car_valuation->link2_comment = $request->link2_comment;
        $customer_car_valuation->link3 = $request->link3;
        $customer_car_valuation->link3_comment = $request->link3_comment;
        $customer_car_valuation->link4 = $request->link4;
        $customer_car_valuation->link4_comment = $request->link4_comment;
        $customer_car_valuation->link5 = $request->link5;
        $customer_car_valuation->link5_comment = $request->link5_comment;
        $customer_car_valuation->offer_price = $request->offer_price;
        $customer_car_valuation->earning = $request->earning;
        $customer_car_valuation->date_sendconfirm = $request->date_sendconfirm;
        $customer_car_valuation->date_customer_open = $request->date_customer_open;
        $customer_car_valuation->date_confirm = $request->date_confirm;
        $customer_car_valuation->is_confirm = $request->is_confirm;
        $customer_car_valuation->status = $request->status;
        $customer_car_valuation->save();
    }

    public function update($id, $request)
    {
        $customer_car_valuation = CustomerCar::find($id);
        $customer_car_valuation->comment = $request->comment;
        $customer_car_valuation->link1 = $request->link1;
        $customer_car_valuation->link1_comment = $request->link1_comment;
        $customer_car_valuation->link2 = $request->link2;
        $customer_car_valuation->link2_comment = $request->link2_comment;
        $customer_car_valuation->link3 = $request->link3;
        $customer_car_valuation->link3_comment = $request->link3_comment;
        $customer_car_valuation->link4 = $request->link4;
        $customer_car_valuation->link4_comment = $request->link4_comment;
        $customer_car_valuation->link5 = $request->link5;
        $customer_car_valuation->link5_comment = $request->link5_comment;
        $customer_car_valuation->offer_price = $request->offer_price;
        $customer_car_valuation->earning = $request->earning;
        $customer_car_valuation->date_sendconfirm = $request->date_sendconfirm;
        $customer_car_valuation->date_customer_open = $request->date_customer_open;
        $customer_car_valuation->date_confirm = $request->date_confirm;
        $customer_car_valuation->is_confirm = $request->is_confirm;
        $customer_car_valuation->status = $request->status;
        $customer_car_valuation->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }

    public function assignmentDo($request)
    {
        try {
            $customercar = CustomerCar::find($request->customer_car_id);
            $customercar->user_id = $request->expert;
            $customercar->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function status($request, $status)
    {
        try {
            $customercar = CustomerCar::find($request->customer_car_id);
            $customercar->status = $status;
            $customercar->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function statusLog($request, $status)
    {
        try {
            $customercarstatushistories = new CustomerCarStatuHistory();
            $customercarstatushistories->customer_car_id = $request->customer_car_id;
            $customercarstatushistories->status = $status;
            $customercarstatushistories->user_id = Auth::id();
            $customercarstatushistories->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkAssingTo($request, $status)
    {
        return CustomerCarStatuHistory::where('customer_car_id', $request->customer_car_id)->where('status', $status)->count();
    }

    public function getType($type)
    {
        $arrray = [];
        $customer_cars = CustomerCar::where('status', $type)->get()->take(setting('pagination_item'));
        foreach ($customer_cars as $customer_car) {
            $arrray[] = array(
                'name' => $customer_car->car->brand_name,
                'id' => $customer_car->id,
                'default_image' => $customer_car->default_image,
                'gear' => Transmission::Transmission[$customer_car->gear],
                'fuel' => FullType::FullType[$customer_car->fuel],
                'body' => BodyType::BodyType[$customer_car->body],
                'year' => $customer_car->caryear,
                'button' => ($type == 5) ? "İncele" : "Favorilere Ekle",
                'price' => ($type == 5) ? $customer_car->suggested . " TL" : "",
                'type' => $type,
                'follow' => CustomerCarFollow::where('customer_id', Auth::guard('customer')->id())->where('customer_car_id', $customer_car->id)->count()
            );
        }
        return $arrray;
    }

    public function customer_add()
    {
        if (!Auth::guard('customer')->check()) {
            $rand = rand(000000, 999999);
            $customer = new Customer();
            $customer->firstname = "John";
            $customer->lastname = "Depth";
            $customer->phone = "5455450000";
            $customer->email = $rand . "@test.com";
            $customer->password = bcrypt($rand);
            $customer->save();

            $credentials = array(
                'email' => $rand . "@test.com",
                'password' => $rand
            );

            if (Auth::guard('customer')->attempt($credentials)) {
                $finduser = Customer::find(Auth::guard('customer')->id());
                Auth::guard('customer')->login($finduser);
            }
            return $customer->id;
        } else {
            return Auth::guard('customer')->id();
        }
    }

    public function firstStepStore($request)
    {
        $customer_id = $this->customer_add();

        if($request->version == null)
        {
            $cars = new Car();
            $cars->brand_id = $request->brand;
            $cars->brand_name = Brand::find($request->brand)->name;
            $cars->model_id = NULL;
            $cars->name = $request->custom_version;
            $cars->model = $request->model;
            $cars->fueltype = $request->fuel;
            $cars->transmission = $request->transmission;
            $cars->bodytype = $request->body;
            $cars->engine = 1;
            $cars->horse = 1;
            $cars->save();

            $car_id = $cars->id;
        }else{
            $car_id = $request->version;
        }

        $customer_car = CustomerCar::updateOrCreate(
            ['customer_id' => $customer_id, 'session_id' => cacheresponseid() ?? \Illuminate\Support\Str::uuid()],
            [
                'customer_id' => $customer_id,
                'caryear' => $request->year??null,
                'body' => $request->body??null,
                'fuel' => $request->fuel??null,
                'gear' => $request->transmission??null,
                'car_id' => $car_id??null,
                'custom_version' => $request->custom_version??null,
                'km' => $request->km??null,
                'color' => $request->color??null,
                'plate' => $request->plate??null,
                'ownorder' => $request->ownorder??null,
                'car_city' => $request->car_city??null,
                'car_state' => $request->car_state??null,
                'description' => $request->description??null,
                'laststep' => '2',
            ]
        );
        return $customer_car->id;
    }

    public function secondStepStore($request)
    {
        $filename = "";
        if (!empty($request->files->all())) {
            $files = $request->files->all()['tramer_image'];
            $this->upload->index($files,'tramers');
            $filename = $this->upload->getFileName();
        }

        $customer_car = CustomerCar::where('id',$request->customer_car_id)->first();
        $customer_car->damage = json_encode($request->damage);
        $customer_car->tramer = $request->tramer;
        $customer_car->tramerValue = $request->tramer_price;
        $customer_car->tramer_photo = $filename;
        $customer_car->laststep = 2;
        $customer_car->save();
        return $request->customer_car_id;
    }

    public function thirtyStepStore($request)
    {

        $customer_car = CustomerCar::where('id',trim($request->customer_car_id))->first();
        $customer_car->car_details = $request->car_details;
        $customer_car->car_notwork = $request->car_notwork;
        $customer_car->car_exterior_faults = $request->car_exterior_faults;
        $customer_car->car_interior_faults = $request->car_interior_faults;
        $customer_car->maintenance_history = $request->maintenance_history;
        $customer_car->status_frame = $request->status_frame;
        $customer_car->status_pole = $request->status_pole;
        $customer_car->status_podium = $request->status_podium;
        $customer_car->status_airbag = $request->status_airbag;
        $customer_car->status_unrealizable = $request->status_unrealizable;
        $customer_car->status_onArkaBagaj = $request->status_onArkaBagaj;
        $customer_car->status_km = $request->status_km;
        $customer_car->status_tyre = $request->status_tyre;
        $customer_car->date_inspection = $request->date_inspection;
        $customer_car->gal_price_1 = $request->gal_fiyat_1;
        $customer_car->laststep = 3;
        $customer_car->save();


        if (!empty($request->files->all())) {
            $files = $request->files->all();
            foreach ($files as $key => $file) {
                $this->upload->index($file,'expers');
                $filename = $this->upload->getFileName();
                $image = new CustomerCarExper();
                $image->customer_car_id = $request->customer_car_id;
                $image->image = $filename;
                $image->save();
            }
        }

        return $request->customer_car_id;
    }


    public function fourth($filename,$request)
    {
        $customer_car = CustomerCar::where('id', $request->customer_car_id)->first();
        $customer_car_photo = new CustomerCarPhoto();
        $customer_car_photo->customer_car_id = $customer_car->id;
        $customer_car_photo->image = $filename;
        $customer_car_photo->active = 0;
        $customer_car_photo->save();

        $customer_car->laststep = 4;
        $customer_car->save();
    }

    public function fifthStep($request)
    {
        // TODO: Implement fifthStep() method.
    }
}