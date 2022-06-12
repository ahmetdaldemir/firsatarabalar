<?php namespace App\Repositories\Cities;

interface CityRepositoryInterface
{

    public function get();
    public function getById($id);
    public function delete($id);
    public function create($request);
    public function update($id,$request);
    public function filter();

}