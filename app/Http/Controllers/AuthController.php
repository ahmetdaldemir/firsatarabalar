<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            'phone' => $request->phone,
            'password' => $request->password
        );
        $remember_me = $request->has('remember') ? true : false;

        if (Auth::guard('customer')->attempt($credentials, $remember_me)) {

            return response()->json(['success' => true], 200);

/*
            $finduser = Customer::find(Auth::guard('customer')->id());
            Auth::guard('customer')->login($finduser, $remember_me);
            return response()->json(['success' => true], 200); */
        }
        return response()->json(['success' => false, 'message' => "Hatalı Kullanıcı Adı ve Şifre"], 200);
    }

    public function logout() {
        Session::flush();
        Auth::guard('customer')->logout();
        return Redirect('/');
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'phone' => 'required|numeric|min:10|unique:customers',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);


        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $affiliate = Affiliate::where('phone',$request->phone)->first();
        if($affiliate)
        {
            $affiliate->status = 1;
            $affiliate->save();

            $newCustomer = Customer::where('customer_id',$affiliate->customer_id)->first();
            $newCustomer->reward += 1;
            $newCustomer->save();
        }

        return response()->json(['success' => false, 'message' => $validated], 200);

    }

}