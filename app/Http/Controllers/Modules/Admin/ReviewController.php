<?php namespace App\Http\Controllers\Modules\Admin;

 use App\Enums\DateEnum;
 use App\Http\Controllers\Controller;
 use App\Repositories\Reviews\ReviewRepositoryInterface;
 use Illuminate\Http\JsonResponse;
 use Illuminate\Http\Request;
 use Illuminate\Http\Response;


 class ReviewController extends Controller
{
    private ReviewRepositoryInterface $ReviewRepository;

    public function __construct(ReviewRepositoryInterface $ReviewRepository)
    {
        $this->ReviewRepository = $ReviewRepository;
    }

    public function index()
    {
        $data['reviews'] = $this->ReviewRepository->get();
        return view('admin.review.index',$data);
    }

     public function form(Request $request)
     {
         $data['review'] = NULL;
         if($request)
         {
             $data['review'] = $this->ReviewRepository->getById($request->id);
         }
         return view('admin.review.form',$data);
     }

     public function create()
     {
         $data['Review'] = [];
         return view('admin.review.form',$data);
     }


     public function store(Request $request)
     {
         if(!isset($request->id))
         {
             $this->ReviewRepository->create($request);
         }else{
             $this->ReviewRepository->update($request->id,$request);
         }
         return redirect()->route('admin.review.index');
     }


     public function show(Request $request): JsonResponse
     {
         $id = $request->route('id');

         return response()->json([
             'data' => $this->ReviewRepository->getById($id)
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
             'data' => $this->ReviewRepository->update($id, $data)
         ]);
     }

     public function destroy(Request $request): JsonResponse
     {
         $id = $request->route('id');
         $this->ReviewRepository->delete($id);

         return response()->json(null, Response::HTTP_NO_CONTENT);
     }

     public function status(Request $request)
     {
         $this->ReviewRepository->status($request);
         return redirect()->back();
     }
}