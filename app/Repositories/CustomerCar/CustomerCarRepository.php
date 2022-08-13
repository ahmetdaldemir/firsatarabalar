<?php namespace App\Repositories\CustomerCar;

use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Transmission;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarExper;
use App\Models\CustomerCarPhoto;
use App\Models\CustomerCarStatuHistory;
use App\Services\Upload;
use Illuminate\Support\Facades\Auth;

class CustomerCarRepository implements CustomerCarInterface
{

    protected $upload;

    public function __construct()
    {
        $this->upload = new Upload();

    }

    public function get()
    {
        return CustomerCar::orderBy('id', 'desc')->simplePaginate(10);
    }

    public function getDistrict($id)
    {
        return CustomerCar::where('city_id', $id)->get();
    }

    public function getById($id)
    {
        return CustomerCar::findOrFail($id);
    }

    public function delete($id)
    {
        return CustomerCar::destroy($id);
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
        return CustomerCarStatuHistory::where('customer_car_id', $request->customer_car_id)->where('status', $status)->get();
    }


    public function getType($type)
    {
        $arrray = [];
        $customer_cars =  CustomerCar::where('status', $type)->get()->take(setting('pagination_item'));
        foreach ($customer_cars as $customer_car)
        {
            $arrray[] = array(
                'name'   =>  $customer_car->car->brand_name,
                'gear'   => Transmission::Transmission[$customer_car->gear],
                'fuel'   =>  FullType::FullType[$customer_car->fuel],
                'body'   =>  BodyType::BodyType[$customer_car->body],
                'year'   =>  $customer_car->caryear,
                'button' => ($type == 4)?"İncele" : "Takibe Al",
                'price'  => ($type == 4)? $customer_car->suggested ." TL" : "",
            );
        }
        return $arrray;
    }

    public function customer_add()
    {
        if (!Auth::check()) {
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
            return Auth::id();
        }
    }

    public function firstStepStore($request)
    {
        $customer_id = $this->customer_add();

        $customer_car = CustomerCar::updateOrCreate(
            ['customer_id' => $customer_id, 'session_id' => cacheresponseid()],
            [
                'customer_id' => $customer_id,
                'caryear' => $request->year,
                'body' => $request->body,
                'fuel' => $request->fuel,
                'gear' => $request->transmission,
                'car_id' => $request->version,
                'km' => $request->km,
                'color' => $request->color,
                'plate' => $request->plate,
                'ownorder' => $request->ownorder,
                'car_city' => $request->car_city,
                'car_state' => $request->car_state,
                'description' => $request->description,
                'laststep' => '1',
            ]
        );


        return $customer_car->id;


        /*  `customer_id`,
          `buyer_id`,
          ``,
          `custom_version`,
          `user_id`,
          ``,
          ``,
            ``,
          ``,
          ``,
          `sasi`,
          ``,
          `sebep`,
          `score`,
          ``,
          `kmPhoto`,
          ``,
          ``,
          ``,
          `damage`,
          `maintenance_history`,
          `status_frame`,
          `status_pole`,
          `status_podium`,
          `status_airbag`,
          `status_triger`,
          `status_oppression`,
          `status_brake`,
          `status_tyre`,
          `status_km`,
          `status_unrealizable`,
          `status_onArkaBagaj`,
          `specs`,
          `tramer`,
          `tramerValue`,
          `tramer_photo`,
          `car_notwork`,
          `car_exterior_faults`,
          `car_interior_faults`,
          `gal_price_1`,
          `gal_price_2`,
          `gal_price_3`,
          `valuation`,
          `suggested`,
          `suggested_accept`,
          `shows`,
          `date_end`,
          `date_inspection`,
          ``,
          `status`, */

    }

    public function secondStepStore($request)
    {

        $filename = "";
        if (!empty($request->files->all())) {
            $files = $request->files->all()['tramer_image'];
            $this->upload->index($files);
            $filename = $this->upload->getFileName();
        }

        $customer_car = CustomerCar::find($request->customer_car_id);
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

        $customer_car = CustomerCar::find($request->customer_car_id);
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
        $customer_car->laststep = 3;
        $customer_car->save();


        if (!empty($request->files->all())) {
            $files = $request->files->all();
            foreach ($files as $key => $file) {
                $this->upload->index($file);
                $filename = $this->upload->getFileName();
                $image = new CustomerCarExper();
                $image->customer_car_id = $request->customer_car_id;
                $image->image = $filename;
                $image->save();
            }
        }

        return $request->customer_car_id;
    }


    public function fourth($request)
    {
        $customer_car = CustomerCar::where('session_id',cacheresponseid())->first();
        $customer_car_photo = new CustomerCarPhoto();
        $customer_car_photo->customer_car_id = $customer_car->id;
        $customer_car_photo->image = $request;
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