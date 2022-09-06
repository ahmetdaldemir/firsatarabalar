<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\carRequest;
use App\Models\Car;
use App\Repositories\Cars\CarRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \DB;
class CarController extends Controller
{
    private CarRepositoryInterface $CarRepository;

    public function __construct(CarRepositoryInterface $CarRepository)
    {
        $this->CarRepository = $CarRepository;
     }

    public function index()
    {
        $data['show'] = "";
        $data['cars'] = $this->CarRepository->get();
        $data['searchroute'] = "admin.car.search";

        return view('admin.car.index',$data);
    }

    public function deleted()
    {
        $data['show'] = "checked";
        $data['cars'] = $this->CarRepository->deleted();
        return view('admin.car.index',$data);
    }


    public function form(Request $request)
    {
        $data['car'] = $this->CarRepository->getById($request->id);
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = $this->CityRepository->get();
        return view('admin.car.form',$data);
    }

    public function create()
    {
        $data['car'] = NULL;
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = $this->CityRepository->get();
        return view('admin.car.form',$data);
    }


    public function store(carRequest $request)
    {
        if(is_null($request->car_id))
        {
            $this->CarRepository->create($request);
        }else{
            $this->CarRepository->update($request->car_id,$request);
        }
        return redirect()->route('admin.car.index');
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->CarRepository->getById($id)
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
            'data' => $this->CarRepository->update($id, $data)
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $this->CarRepository->delete($id);
        return response()->json(null, Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        $data['show'] = "";
        $data['searchroute'] = "admin.car.search";
        $data['cars'] = Car::orWhere(DB::raw("CONCAT(`brand_name`, ' ', `name`)"), 'LIKE', "%" . $request->q . "%")->paginate(10);
        return view('admin.car.index',$data);
    }
}