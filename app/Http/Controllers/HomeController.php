<?php

namespace App\Http\Controllers;

use App\Models\CustomerCar;
use App\Models\CustomerCarValuation;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data['chart'] = [];
        return view('view.home',$data);
    }
    public function authpage()
    {
        $data['chart'] = [];
        return view('view.auth',$data);
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
    }
}