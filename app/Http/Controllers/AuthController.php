<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    /*
       |--------------------------------------------------------------------------
       | Login Controller
       |--------------------------------------------------------------------------
       |
       | This controller handles authenticating users for the application and
       | redirecting them to your home screen. The controller uses a trait
       | to conveniently provide its functionality to your applications.
       |
       */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     }

    public function login(Request $request)
    {

        $credentials = array(
            'email' => $request->email,
            'password' => $request->password
        );

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::guard('customer')->attempt($credentials, $remember_me)) {
            $finduser = Customer::find(Auth::guard('customer')->id());
            Auth::guard('customer')->login($finduser, $remember_me);
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => "Hatalı Kullanıcı Adı ve Şifre"], 200);
    }

    public function register(Request $request)
    {
        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();
    }
}