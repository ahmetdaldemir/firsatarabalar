<?php namespace App\Repositories\Cars;

use App\Models\Car;

class CarRepository implements CarRepositoryInterface
{
    public function get()
    {
        return Car::simplePaginate(50);
    }


    public function getById($id)
    {
        return Car::findOrFail($id);
    }

    public function delete($id)
    {
        return Car::destroy($id);
    }

    public function create($request)
    {
        $Cities = new Car();
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
        $Cities = Car::find($id);
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