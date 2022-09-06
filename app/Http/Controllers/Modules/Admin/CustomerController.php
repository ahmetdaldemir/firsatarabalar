<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\Customers\CustomerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \DB;

class CustomerController extends Controller
{
    private CustomerRepositoryInterface $CustomerRepository;
    private CityRepositoryInterface $CityRepository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository, CityRepositoryInterface $CityRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
        $this->CityRepository = $CityRepository;
    }

    public function index()
    {
        $show = "";
        $customers = $this->CustomerRepository->get();
        $searchroute = "admin.customer.search";
        return view('admin.customer.index', compact('show', 'customers', 'searchroute'));
    }

    public function deleted()
    {
        $data['show'] = "checked";
        $data['customers'] = $this->CustomerRepository->deleted();
        return view('admin.customer.index', $data);
    }


    public function form(Request $request)
    {
        $data['customer'] = $this->CustomerRepository->getById($request->id);
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = $this->CityRepository->get();
        return view('admin.customer.form', $data);
    }

    public function create()
    {
        $data['customer'] = NULL;
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = $this->CityRepository->get();
        return view('admin.customer.form', $data);
    }


    public function store(CustomerRequest $request)
    {
        if (is_null($request->customer_id)) {
            $this->CustomerRepository->create($request);
        } else {
            $this->CustomerRepository->update($request->customer_id, $request);
        }
        return redirect()->route('admin.customer.index');
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->CustomerRepository->getById($id)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $data = $request->only([
            'client',
            'details'
        ]);

        return response()->json([
            'data' => $this->CustomerRepository->update($id, $data)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->CustomerRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


    public function status(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->status = $request->status;
        $customer->save();
        return redirect()->back();
    }


    public function search(Request $request)
    {
        $show = "";
        $searchroute = "admin.customer.search";
        $customers = Customer::orWhere(DB::raw("CONCAT(`firstname`, ' ', `lastname`)"), 'LIKE', "%" . $request->q . "%")->paginate(10);
        return view('admin.customer.index', compact('show', 'customers', 'searchroute'));
    }
}