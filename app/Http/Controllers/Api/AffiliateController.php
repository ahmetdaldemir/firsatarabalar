<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\AffiliateMessage;
use App\Models\Affiliate;
use App\Models\Customer;
use App\Repositories\Affiliate\AffiliateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliateController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return  Affiliate::where('customer_id',$request->customer_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $affiliate = Affiliate::where('phone', $request->phone)->first();
        if ($affiliate) {
            return response()->json(['success' => false, 'message' => "Daha Önce Öneri Gönderildi"], 200);

        }

        $customer = Customer::where('phone', $request->phone)->first();
        if ($customer) {
             return response()->json(['success' => false, 'message' => "Sayın" . $request->fullname . "Üyemizdir."], 200);

        }

        $affiliate = new Affiliate();
        $affiliate->customer_id = $request->customer_id;
        $affiliate->phone = $request->phone;
        $affiliate->fullname = $request->fullname;
        $affiliate->save();
        $customer = Customer::find($request->customer_id);
        $this->dispatch(new AffiliateMessage($affiliate, $customer));
        return response()->json(['success' => true, 'message' => "Öneri GÖnderildi"], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  Affiliate::find($id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $affiliate = Affiliate::where('customer_id', $request->customer_id)->where('id', $request->id)->first();
        $affiliate->delete();
    }
}
