<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerCarFollow;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthController extends Controller

{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:customers',
            'phone' => 'required|numeric|min:10|unique:customers',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'false', 'data' => $validator->messages()], 200);
        }

        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $customer->save();
        return response(['status' => 'success'], 200);
    }

    public function login(Request $request)
    {
        Log::info($request);
        $credentials = array(
            'phone' => $request->phone,
            'password' => $request->password
        );
        $remember_me = $request->has('remember') ? true : false;

        if (Auth::guard('customer')->attempt($credentials, $remember_me)) {
            $user = Customer::find(Auth::guard('customer')->id());
            $userToken = $user->createToken('api - token')->plainTextToken;
            $follows = CustomerCarFollow::where('customer_id',Auth::guard('customer')->id())->get();

            Device::firstOrCreate(
                ['customer_id' =>Auth::guard('customer')->id(),'deviceId' => $request->device_id],
                ['device' => $request->device]
            );

            return response(['status' => 'success', 'data' => $user,'favorites' => $follows, 'token' => $userToken], 200);
        }
        return response()->json(['success' => false, 'message' => "Hatalı Kullanıcı Adı ve Şifre"], 200);
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