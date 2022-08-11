<?php namespace App\Repositories\Brands;

use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface
{
    public function get()
    {
        return Brand::all();
    }


    public function getById($id)
    {
        return Brand::findOrFail($id);
    }

    public function delete($id)
    {
        return Brand::destroy($id);
    }

    public function create($request)
    {
        $Cities = new Brand();
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
        $Cities = Brand::find($id);
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