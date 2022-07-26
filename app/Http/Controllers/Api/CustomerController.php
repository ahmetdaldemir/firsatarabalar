<?php namespace App\Http\Controllers\Api;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Town;
use App\Repositories\Customers\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private CustomerRepositoryInterface $CustomerRepository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function index()
    {
        $data = $this->CustomerRepository->get();
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function show($id)
    {
        return $id;
        $data = $this->CustomerRepository->getById($id);
        return \response()->json([
            'data' => $data,
        ], 200);
    }


}