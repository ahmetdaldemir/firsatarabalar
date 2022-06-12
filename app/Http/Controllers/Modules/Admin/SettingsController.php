<?php namespace App\Http\Controllers\Modules\Admin;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Cities\CityRepositoryInterface;
use App\Repositories\Customers\CustomerRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
     private CityRepositoryInterface $CityRepository;

    public function __construct(CityRepositoryInterface $CityRepository)
    {
         $this->CityRepository = $CityRepository;
    }

    public function city($id)
    {
       return $this->CityRepository->getDistrict($id);
    }


}