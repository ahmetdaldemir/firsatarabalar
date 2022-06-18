<?php

namespace App\Repositories\Roles;

use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

    public function get()
    {
       return Role::all();
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