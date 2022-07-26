<?php namespace App\Http\Controllers\Api;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Neighbourhood;
use App\Models\Page;
use App\Models\Town;
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

    public function __construct(CityRepositoryInterface $CityRepository, SettingRepositoryInterface $settingRepository)
    {
        $this->CityRepository = $CityRepository;
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $setting = $this->settingRepository->index();
        return \response()->json([
            'data' => $setting,
        ], 200);
    }

    public function cities()
    {
        $data = City::all();
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function towns(Request $request)
    {
         $data = Town::where('city_id', $request->id)->get();
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function distincs(Request $request)
    {

        $data = District::where('town_id', $request->id)->get();
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function neighbourhoods(Request $request)
    {

        $data = Neighbourhood::where('town_id', $request->id)->where('district_id', $request->id)->get();
        return \response()->json([
            'data' => $data,
        ], 200);
    }


    public function cars()
    {
        $data = Car::all();
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function colors()
    {
        $data = Color::all();
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function brands(Request $request)
    {
        if($request->id == 0)
        {
            $data = Brand::all();
        }else{
            $data = Brand::where('id',$request->id)->get();
        }
        return \response()->json([
            'data' => $data,
        ], 200);
    }

    public function page(Request $request)
    {
        $data = Page::find($request->id);
        return \response()->json([
            'data' => $data,
        ], 200);
    }


    public function page_category(Request $request)
    {
        $data = Page::where('type',$request->type)->get();
        return \response()->json([
            'data' => $data,
        ], 200);
    }



}