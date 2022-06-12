<?php

namespace App\Repositories\Town;

use App\Models\Town;

class TownRepository implements TownRepositoryInterface
{

    public function get()
    {
        return Town::all();
    }

    public function getDistrict($id)
    {
        return Town::where('town_id',$id)->get();
    }

    public function getById($id)
    {
        return Town::findOrFail($id);
    }

    public function delete($id)
    {
        return Town::destroy($id);
    }

    public function create($request)
    {
        $Cities = new Town();
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
        $Cities = Town::find($id);
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