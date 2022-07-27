<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\Customers\CustomerRepositoryInterface;
use App\Services\Upload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
    private CityRepositoryInterface $CityRepository;
    protected $upload;

    public function __construct(CityRepositoryInterface $CityRepository)
    {
        $this->CityRepository = $CityRepository;
        $this->upload = new Upload();
    }

    public function city($id)
    {
        return $this->CityRepository->getDistrict($id);
    }

    public function index()
    {
        $data['settings'] = Setting::all();
        return view('admin.setting.index', $data);
    }

    public function save(Request $request)
    {
        dd($request);
        if (!empty($request->files->all())) {
            $files = $request->files->all()['setting'];
            foreach ($files as $key => $file) {
                $this->upload->index($file);
                $filename = $this->upload->getFileName();
                $setting = Setting::where('key', $key)->first();
                $setting->value = $filename;
                $setting->save();
            }
        }


    }

}