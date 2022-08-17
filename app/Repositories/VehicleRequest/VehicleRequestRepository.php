<?php
namespace App\Repositories\VehicleRequest;

use App\Models\VehicleRequest;

class VehicleRequestRepository implements VehicleRequestRepositoryInterface
{
    public function get()
    {
        return VehicleRequest::orderBy('id','desc')->get();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($id, $request)
    {
        // TODO: Implement update() method.
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }
}