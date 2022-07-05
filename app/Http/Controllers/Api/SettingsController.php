<?php namespace App\Http\Controllers\Api;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\Customers\CustomerRepositoryInterface;
use App\Repositories\Settings\SettingRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
     private CityRepositoryInterface $CityRepository;
     private SettingRepositoryInterface $settingRepository;

    public function __construct(CityRepositoryInterface $CityRepository,SettingRepositoryInterface $settingRepository)
    {
         $this->CityRepository = $CityRepository;
         $this->settingRepository = $settingRepository;
    }

    public function index()
    {
       $setting = $this->settingRepository->index();
       return \response()->json([
           'data' => $setting,
       ],200);
    }


}