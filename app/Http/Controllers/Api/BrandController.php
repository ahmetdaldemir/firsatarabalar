<?php namespace App\Http\Controllers\Api;

use App\Enums\DateEnum;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Town;
use App\Repositories\Brands\BrandRepositoryInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private BrandRepositoryInterface $BrandRepository;

    public function __construct(BrandRepositoryInterface $BrandRepository)
    {
        $this->BrandRepository = $BrandRepository;
    }

    public function index()
    {
        $data = $this->BrandRepository->get();
		foreach($data as $value){
			$values[] = array(
				'id' => $value->id,
				'name' => $value->name
			);
		}

		return $values;

    }

    public function show($id)
    {
        return $id;
        $data = $this->BrandRepository->getById($id);
        return \response()->json([
            'data' => $data,
        ], 200);
    }


}