<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\carRequest;
use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Repositories\CustomerCarValuation\CustomerCarValuationInterface;
use App\Repositories\Experts\ExpertRepositoryInterface;
use App\Repositories\Valuation\ValuationRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ValuationController extends Controller
{
    private CustomerCarInterface $CustomerCar;
    private ValuationRepositoryInterface $ValuationRepository;
    protected $now;

    public function __construct(CustomerCarInterface $CustomerCar,ExpertRepositoryInterface $ExpertRepository,ValuationRepositoryInterface $ValuationRepository)
    {
        $this->CustomerCar = $CustomerCar;
        $this->ExpertRepository = $ExpertRepository;
        $this->ValuationRepository = $ValuationRepository;
        $this->now = Carbon::now();
    }

    public function index(Request $request)
    {
        $data['show'] = "";
        $data['customer_car'] = $this->CustomerCar->getById($request->id);
         $data['years'] = DateEnum::Years;
        $data['mounth'] =$this->now->month;
        $data['this_year'] =$this->now->year;
        return view('admin.valuation.index',$data);
    }

    public function deleted()
    {
        $data['show'] = "checked";
        $data['cars'] = $this->CustomerCarValuation->deleted();
        return view('admin.car.index',$data);
    }


    public function form(Request $request)
    {
        $data['car'] = $this->CustomerCarValuation->getById($request->id);
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
            $this->CustomerCarValuation->create($request);
        }else{
            $this->CustomerCarValuation->update($request->car_id,$request);
        }
        return redirect()->route('admin.car.index');
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->CustomerCarValuation->getById($id)
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
            'data' => $this->CustomerCarValuation->update($id, $data)
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $this->CustomerCarValuation->delete($id);
        return response()->json(null, Response::HTTP_OK);
    }
}