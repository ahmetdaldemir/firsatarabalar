<?php

namespace App\Repositories\Cities;

use App\Models\City;
use App\Models\Town;

class CityRepository implements CityRepositoryInterface
{

    public function get()
    {
        return City::all();
    }

    public function getDistrict($id)
    {
        return Town::where('city_id',$id)->get();
    }

    public function getById($id)
    {
        return City::findOrFail($id);
    }

    public function delete($id)
    {
        return City::destroy($id);
    }

    public function create($request)
    {
        $Cities = new City();
        $Cities->firstname = $request->firstname;
        $Cities->lastname = $request->lastname;
        $Cities->email = $request->email;
        $Cities->phone = $request->phone;
        $Cities->password = bcrypt($request->password);
        $Cities->earn = 0;
        $Cities->save();
    }

    public function update($id, $request)
    {
        $Cities = City::find($id);
        $Cities->firstname = $request->firstname;
        $Cities->lastname = $request->lastname;
        $Cities->email = $request->email;
        $Cities->phone = $request->phone;
        if ($request->password) {
            $Cities->password = bcrypt($request->password);
        }
        $Cities->earn = $request->earn;
        if (empty($request->status)) {
            $Cities->status = 0;
        }else{
            $Cities->status = $request->status;
        }
        $Cities->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }




}