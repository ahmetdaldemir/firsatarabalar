<?php namespace App\Repositories\CustomerCar;

interface CustomerCarInterface
{
    public function get($request);
    public function getById($id);
    public function getByValuationCustomerId($id);
    public function delete($id);
    public function create($request);
    public function update($id,$request);
    public function filter();
    public function assignmentDo($request);
    public function status($request,$status);
    public function statusLog($request,$status);
    public function getType($type);
    public function firstStepStore($request);
    public function secondStepStore($request);
    public function thirtyStepStore($request);
    public function fourth($id,$request);
    public function fifthStep($request);
    public function getShows();

}