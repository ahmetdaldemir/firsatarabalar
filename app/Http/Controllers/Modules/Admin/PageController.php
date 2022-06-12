<?php namespace App\Http\Controllers\Modules\Admin;

 use App\Enums\DateEnum;
 use App\Http\Controllers\Controller;
 use App\Repositories\Pages\PageRepositoryInterface;
 use Illuminate\Http\JsonResponse;
 use Illuminate\Http\Request;
 use Illuminate\Http\Response;


 class PageController extends Controller
{
    private PageRepositoryInterface $PageRepository;

    public function __construct(PageRepositoryInterface $PageRepository)
    {
        $this->PageRepository = $PageRepository;
    }

    public function index()
    {
        $data['pages'] = $this->PageRepository->get();
        return view('admin.page.index',$data);
    }

     public function form(Request $request)
     {
         $data['page'] = NULL;


         if($request)
         {
             $data['page'] = $this->PageRepository->getById($request->id);
         }
         return view('admin.page.form',$data);
     }

     public function create()
     {
         $data['page'] = [];
         return view('admin.page.form',$data);
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