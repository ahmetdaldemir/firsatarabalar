<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\expertisesRequest;
use App\Models\City;
use App\Models\expertises;
use App\Models\Expertise;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\expertisess\expertisesRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \DB;

class ExpertisController extends Controller
{

    public function __construct()
    {
         //
    }

    public function index()
    {
        $show = "";
        $expertiseses = Expertise::all();
        $searchroute = "admin.expertises.search";
        return view('admin.expertises.index', compact('show', 'expertiseses', 'searchroute'));
    }

    public function deleted()
    {
        $data['show'] = "checked";
        $data['expertisess'] = $this->expertisesRepository->deleted();
        return view('admin.expertises.index', $data);
    }


    public function form(Request $request)
    {
        $data['expertises'] = $this->expertisesRepository->getById($request->id);
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = City::all();
        return view('admin.expertises.form', $data);
    }

    public function create()
    {
        $data['expertises'] = NULL;
        $data['payments'] = NULL;
        $data['cars'] = NULL;
        $data['cities'] = City::all();
        return view('admin.expertises.form', $data);
    }


    public function store(Request $request)
    {
        $expertises = new Expertise();
        $expertises->fullname  = $request->fullname;
        $expertises->phone  = $request->phone;
        $expertises->email  = $request->email;
        $expertises->price  = $request->price;
        $expertises->address  = $request->address;
        $expertises->city_id  = $request->city_id;
        $expertises->state_id  = $request->state_id;
        $expertises->status  = $request->status??0;
        $expertises->save();
        return redirect()->route('admin.expertises.index');
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->expertisesRepository->getById($id)
        ]);
    }

    public function update(Request $request)
    {
        $this->expertisesRepository->update($request->expertises_id, $request);
        return redirect()->route('admin.expertises.index');
    }

    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->expertisesRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


    public function status(Request $request)
    {
        $expertises = expertises::find($request->id);
        $expertises->status = $request->status;
        $expertises->save();
        return redirect()->back();
    }


    public function search(Request $request)
    {
        $show = "";
        $searchroute = "admin.expertises.search";
        $expertisess = expertises::orWhere(DB::raw("CONCAT(`firstname`, ' ', `lastname`)"), 'LIKE', "%" . $request->q . "%")->paginate(10);
        return view('admin.expertises.index', compact('show', 'expertisess', 'searchroute'));
    }
}