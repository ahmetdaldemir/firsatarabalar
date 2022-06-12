<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ExpertEarning;
use App\Repositories\Experts\ExpertRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpertController extends Controller
{
    private ExpertRepositoryInterface $ExpertRepository;

    public function __construct(ExpertRepositoryInterface $ExpertRepository)
    {
        $this->ExpertRepository = $ExpertRepository;
    }

    public function index()
    {
        $data['experts'] = $this->ExpertRepository->get();
        return view('admin.expert.index',$data);
    }

    public function form(Request $request)
    {
        $data['expert'] = NULL;
        $data['dateBegin'] = NULL;
        $data['dateEnd'] = NULL;
        $data['years'] = NULL;

           if($request)
            {
                $data['expert'] = $this->ExpertRepository->getById($request->id);
                $data['dateBegin'] = NULL;
                $data['dateEnd'] = NULL;
                $data['years'] = DateEnum::Years;

            }
        return view('admin.expert.form',$data);
    }

    public function create()
    {
        $data['expert'] = NULL;
        $data['dateBegin'] = NULL;
        $data['dateEnd'] = NULL;
        $data['years'] = NULL;

        return view('admin.expert.form',$data);
    }
    public function store(Request $request)
    {
        if(is_null($request->expert_id))
        {
            $this->ExpertRepository->create($request);
        }else{
            $this->ExpertRepository->update($request->expert_id,$request);
        }
        return redirect()->route('admin.expert.index');
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->ExpertRepository->getById($id)
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
            'data' => $this->ExpertRepository->update($id, $data)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->ExpertRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}