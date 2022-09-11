<?php

namespace App\Repositories\Customers;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{

    public function get()
    {
        return Customer::orderBy('id','desc')->simplePaginate(20);
    }

    public function deleted()
    {
        return Customer::withTrashed()->get();
    }

    public function getById($id)
    {
        return Customer::findOrFail($id);
    }


    public function delete($id)
    {
        return Customer::destroy($id);
    }

    public function create($request)
    {
        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->identity = $request->identity;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        if($request->password)
        {
            $customer->password = bcrypt($request->password);
        }

        $customer->gender = $request->gender;
        $customer->birthday = $request->birthday;
        $customer->smscode = $request->smscode;
        $customer->city_id = $request->city_id;
        $customer->town_id = $request->town_id;
        $customer->freecar = $request->freecar;
        $customer->date_login = $request->date_login;
        if(empty($request->status))
        {
            $customer->status = 0;
        }else{
            $customer->status = $request->status;
        }

        $customer->save();
    }

    public function update($id, $request)
    {
        $Customer = Customer::find($id);
        $Customer->firstname = $request->firstname;
        $Customer->lastname = $request->lastname;
        $Customer->email = $request->email;
        $Customer->phone = $request->phone;
        if ($request->password) {
            $Customer->password = bcrypt($request->password);
        }
        if (empty($request->status)) {
            $Customer->status = 0;
        }else{
            $Customer->status = $request->status;
        }
        $Customer->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }




}