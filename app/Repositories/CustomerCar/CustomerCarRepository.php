<?php namespace App\Repositories\CustomerCar;

use App\Models\CustomerCar;

class CustomerCarRepository implements CustomerCarInterface
{
    public function get()
    {
        return CustomerCar::orderBy('id', 'desc')->simplePaginate(10);
    }

    public function getDistrict($id)
    {
        return CustomerCar::where('city_id',$id)->get();
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
        $customer_car_valuation->uuid= Str::uuid();
        $customer_car_valuation->customers_car_id=$request->customers_car_id;
        $customer_car_valuation->comment=$request->comment;
        $customer_car_valuation->link1=$request->link1;
        $customer_car_valuation->link1_comment=$request->link1_comment;
        $customer_car_valuation->link2=$request->link2;
        $customer_car_valuation->link2_comment=$request->link2_comment;
        $customer_car_valuation->link3=$request->link3;
        $customer_car_valuation->link3_comment=$request->link3_comment;
        $customer_car_valuation->link4=$request->link4;
        $customer_car_valuation->link4_comment=$request->link4_comment;
        $customer_car_valuation->link5=$request->link5;
        $customer_car_valuation->link5_comment=$request->link5_comment;
        $customer_car_valuation->offer_price=$request->offer_price;
        $customer_car_valuation->earning=$request->earning;
        $customer_car_valuation->date_sendconfirm=$request->date_sendconfirm;
        $customer_car_valuation->date_customer_open=$request->date_customer_open;
        $customer_car_valuation->date_confirm=$request->date_confirm;
        $customer_car_valuation->is_confirm=$request->is_confirm;
        $customer_car_valuation->status=$request->status;
        $customer_car_valuation->save();
    }

    public function update($id, $request)
    {
        $customer_car_valuation = CustomerCar::find($id);
        $customer_car_valuation->comment=$request->comment;
        $customer_car_valuation->link1=$request->link1;
        $customer_car_valuation->link1_comment=$request->link1_comment;
        $customer_car_valuation->link2=$request->link2;
        $customer_car_valuation->link2_comment=$request->link2_comment;
        $customer_car_valuation->link3=$request->link3;
        $customer_car_valuation->link3_comment=$request->link3_comment;
        $customer_car_valuation->link4=$request->link4;
        $customer_car_valuation->link4_comment=$request->link4_comment;
        $customer_car_valuation->link5=$request->link5;
        $customer_car_valuation->link5_comment=$request->link5_comment;
        $customer_car_valuation->offer_price=$request->offer_price;
        $customer_car_valuation->earning=$request->earning;
        $customer_car_valuation->date_sendconfirm=$request->date_sendconfirm;
        $customer_car_valuation->date_customer_open=$request->date_customer_open;
        $customer_car_valuation->date_confirm=$request->date_confirm;
        $customer_car_valuation->is_confirm=$request->is_confirm;
        $customer_car_valuation->status=$request->status;
        $customer_car_valuation->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }
}