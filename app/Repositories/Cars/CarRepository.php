<?php namespace App\Repositories\Cars;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CustomerCar;

class CarRepository implements CarRepositoryInterface
{
    public function get()
    {
        return Car::simplePaginate(50);
    }


    public function getById($id)
    {
        return Car::findOrFail($id);
    }

    public function delete($id)
    {
        return Car::destroy($id);
    }

    public function create($request)
    {
        $car = new Car();
        $car->brand_id = $request->brand_id;
        $car->brand_name = Brand::find($request->brand_id)->name;
        $car->model_id = NULL;
        $car->name = $request->name;
        $car->model = $request->model;
        $car->fueltype = $request->fueltype;
        $car->transmission = $request->transmission;
        $car->bodytype = $request->bodytype;
        $car->engine = $request->engine;
        $car->horse = $request->horse;
        $car->production_start = $request->production_start;
        $car->production_end = $request->production_end;
        $car->status = 1;
        $car->save();
    }

    public function update($id, $request)
    {
        $car = Car::find($id);
        $car->brand_id = $request->brand_id;
        $car->brand_name = Brand::find($request->brand_id)->name;
        $car->model_id = NULL;
        $car->name = $request->name;
        $car->model = $request->model;
        $car->fueltype = $request->fueltype;
        $car->transmission = $request->transmission;
        $car->bodytype = $request->bodytype;
        $car->engine = $request->engine;
        $car->horse = $request->horse;
        $car->production_start = $request->production_start;
        $car->production_end = $request->production_end;
        $car->status = 1;
        $car->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }

    public function version_filter($id)
    {
        return Car::where('brand_id',$id)->distinct()->get(['name']);
    }

}