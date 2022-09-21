<?php

namespace App\Repositories\Users;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function get()
    {
        return User::all();
    }


    public function getExpert()
    {
        return User::where('type',1)->get();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function create($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->earn = 0;
        $user->save();

        $user->syncRoles($request->role);
    }

    public function update($id, $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->earn = $request->earn;
        if (empty($request->status)) {
            $user->status = 0;
        }else{
            $user->status = $request->status;
        }
        $user->save();

        $user->syncRoles($request->role);

    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }
}