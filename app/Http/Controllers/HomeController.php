<?php

namespace App\Http\Controllers;

use App\Enums\CustomerCarStatus;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarValuation;
use App\Services\Sms;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data['chart'] = [];
        return view('new_view.home', $data);
    }

    public function authpage()
    {
        $data['chart'] = [];
        return view('new_view.auth', $data);
    }

    public function passwordchange()
    {
        $data['chart'] = [];
        return view('new_view.passwordchange', $data);
    }

    public function passwordchangepage()
    {
        $data['chart'] = [];
        return view('new_view.passwordchangepage', $data);
    }

    public function passwordchangeconnect(Request $request)
    {
        $customer = Customer::where('email', $request->email)->where('phone', $request->phone)->first();
        if ($customer) {
            $rand = rand(111111, 999999);
            $customer->password = bcrypt($rand);
            $customer->save();
            $requests['message'] = "Sayın " . $customer->firstname . " " . $customer->lastname . " " . $rand . " Şifre giriş yapabilirsiniz";
            $requests['phone'] = $customer->phone;
            $sms = new Sms($requests);
            return redirect()->to('authpage');
        } else {
            return redirect()->to('passwordchange');
        }
    }

    public function sifremidegistir(Request $request)
    {
        $customer = Customer::where('email', $request->email)->where('phone', $request->phone)->where('smscode', $request->smscode)->first();
        if ($customer) {

            $customer->password = bcrypt($request->password);
            $customer->smscode = NULL;
            $customer->save();
            return redirect()->to('authpage');
        } else {
            return redirect()->to('passwordchange');
        }
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }


    public function pdf(Request $request)
    {
        $data['customer_car'] = CustomerCar::find($request->id);
        $data['customer_car_valuation'] = CustomerCarValuation::where('customer_car_id', $request->id)->first();
        return view('pdf/customer_car_valuation_pdf', $data);
    }

    public function valuation_confirm(Request $request)
    {
        $customer_car_valulation = CustomerCarValuation::where('uuid',$request->uuid)->first();

        if($request->status == CustomerCarStatus::STATUS_STRING['CONFIRM'])
        {
            $customer_car_valulation->is_confirm = 1;
            $customer_car_valulation->date_confirm = date('Y-m-d');
            $customer_car_valulation->save();
        }

        $customer_car_valulation->customer_car->status = $request->status;
        $customer_car_valulation->customer_car->save();
    }


}