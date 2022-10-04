<?php namespace App\Repositories\Affiliates;

use App\Jobs\AffiliateMessage;
use App\Models\Affiliate;
use App\Models\Customer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;

class AffiliateRepository implements AffiliateRepositoryInterface
{
    use DispatchesJobs;

    public function get()
    {
        return Affiliate::where('customer_id', Auth::guard('customer')->id())->get();
    }

    public function getById($id)
    {
        return Affiliate::where('customer_id', Auth::guard('customer')->id())->where('id', $id)->get();
    }

    public function delete($id)
    {
        $affiliate = Affiliate::find($id)->first();
        $affiliate->delete();
    }

    public function create($request)
    {
        $affiliate = Affiliate::where('phone', $request->phone)->first();
        if ($affiliate) {
            return ['status' => false, 'message' => "Daha Önce Öneri Gönderildi"];
        }

        $customer = Customer::where('phone', $request->phone)->first();
        if ($customer) {
            return ['status' => false, 'message' => "Sayın" . $request->fullname . "Üyemizdir."];
        }

        $affiliate = new Affiliate();
        $affiliate->customer_id = Auth::guard('customer')->id();
        $affiliate->phone = $request->phone;
        $affiliate->fullname = $request->fullname;
        $affiliate->save();
        $customer = Customer::find(Auth::guard('customer')->id());
        $this->dispatch(new AffiliateMessage($affiliate, $customer));
        return ['status' => true, 'message' => "Öneri Gönderildi"];

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