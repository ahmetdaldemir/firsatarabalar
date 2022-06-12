<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCar extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id'];


    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class,'expert_id','id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class,'car_id','id');
    }
}
