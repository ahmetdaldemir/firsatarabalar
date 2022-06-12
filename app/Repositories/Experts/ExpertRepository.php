<?php

namespace App\Repositories\Experts;

use App\Models\Expert;

class ExpertRepository implements ExpertRepositoryInterface
{

    public function get()
    {
        return Expert::all();
    }

    public function getById($id)
    {
        return Expert::findOrFail($id);
    }

    public function delete($id)
    {
        return Expert::destroy($id);
    }

    public function create($request)
    {
        $expert = new Expert();
        $expert->firstname = $request->firstname;
        $expert->lastname = $request->lastname;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->password = bcrypt($request->password);
        $expert->earn = 0;
        $expert->save();
    }

    public function update($id, $request)
    {
        $expert = Expert::find($id);
        $expert->firstname = $request->firstname;
        $expert->lastname = $request->lastname;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        if ($request->password) {
            $expert->password = bcrypt($request->password);
        }
        $expert->earn = $request->earn;
        if (empty($request->status)) {
            $expert->status = 0;
        }else{
            $expert->status = $request->status;
        }
        $expert->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }




}