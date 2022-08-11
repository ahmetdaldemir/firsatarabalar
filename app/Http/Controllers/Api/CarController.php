<?php namespace App\Http\Controllers\Api;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Town;
use App\Repositories\Cars\CarRepositoryInterface;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private CarRepositoryInterface $CarRepository;

    public function __construct(CarRepositoryInterface $CarRepository)
    {
        $this->CarRepository = $CarRepository;
    }

    public function index()
    {
        $data = $this->CarRepository->get();
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function show($id)
    {
        return $id;
        $data = $this->CarRepository->getById($id);
        return \response()->json([
            'data' => $data,
        ], 200);
    }


}