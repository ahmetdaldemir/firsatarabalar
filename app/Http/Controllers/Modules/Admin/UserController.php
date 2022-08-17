<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\UserEarning;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\Roles\RoleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private UserRepositoryInterface $UserRepository;
    private RoleRepositoryInterface $RoleRepository;

    public function __construct(UserRepositoryInterface $UserRepository, RoleRepositoryInterface $RoleRepository)
    {
        $this->UserRepository = $UserRepository;
        $this->RoleRepository = $RoleRepository;
    }

    public function index()
    {
        $data['users'] = $this->UserRepository->get();
        return view('admin.user.index',$data);
    }

    public function permission(Request $request)
    {
        $data['user'] = $this->UserRepository->getById($request->id);
        $data['roles'] = Role::all();
        return view('admin.user.permission',$data);
    }


    public function permissionsave(Request $request)
    {
        $user = User::find($request->id);
        $user->syncRoles($request->roles);
        return redirect()->back();
    }


    public function form(Request $request)
    {
        $data['user'] = NULL;
        $data['dateBegin'] = NULL;
        $data['dateEnd'] = NULL;
        $data['years'] = NULL;
        $data['roles'] = $this->RoleRepository->get();


        if($request)
            {
                $data['user'] = $this->UserRepository->getById($request->id);
                $data['dateBegin'] = NULL;
                $data['dateEnd'] = NULL;
                $data['years'] = DateEnum::Years;
                $data['roles'] = $this->RoleRepository->get();
            }
        return view('admin.user.form',$data);
    }

    public function create()
    {
        $data['user'] = NULL;
        $data['dateBegin'] = NULL;
        $data['dateEnd'] = NULL;
        $data['years'] = NULL;
        $data['roles'] = $this->RoleRepository->get();

        return view('admin.user.form',$data);
    }
    public function store(Request $request)
    {
        if(is_null($request->user_id))
        {
            $this->UserRepository->create($request);
        }else{
            $this->UserRepository->update($request->user_id,$request);
        }
        return redirect()->route('admin.expert.index');
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json([
            'data' => $this->UserRepository->getById($id)
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
            'data' => $this->UserRepository->update($id, $data)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->UserRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}