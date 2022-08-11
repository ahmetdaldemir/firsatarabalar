<?php namespace App\Repositories\Brands;

interface BrandRepositoryInterface
{
    public function get();
    public function getById($id);
    public function delete($id);
    public function create($request);
    public function update($id,$request);
    public function filter();
}