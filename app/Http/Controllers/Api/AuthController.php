<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;


class AuthController extends Controller

{

    public function register(Request $request)
    {

        $customer_data = Customer::where('email',$request->email)->orWhere('phone',$request->phone)->get();

        if(!Count($customer_data)>0) {
            Customer::create([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'password' => Hash::make($request['password']),
            ]);
            return response(['status' => 'success'], 200);
        }else{
            return response(['error' => 'error'], 200);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        $user = Customer::where('phone', $request->phone)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response(['status' => 'failed','message' => ['Dogrulama Hatalı.']], 200);//500
        }

        $userToken = $user->createToken('api-token')->plainTextToken;
        if($request->device!=null && !$request->device!='null'){
            //$user->update(['device_key' => $request->device]);
        }
        return response(['status' => 'success','data' => $user,'token' => $userToken], 200);
    }

    public function device(Request $request)
    {
        $token = Str::random(32);
        Device::create([
            'device' => $request->device,
            'deviceId' => $request->deviceId,
            'token' => $token,

        ]);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}