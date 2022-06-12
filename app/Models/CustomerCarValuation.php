<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCarValuation extends Model
{
    use HasFactory;

    public function customer_car()
    {
        return $this->belongsTo(CustomerCar::class,'customer_car_id','id');
    }
}
