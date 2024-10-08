<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerCarBuyRequest extends Model
{
    use HasFactory,SoftDeletes;


    public function customer_car()
    {
        return $this->belongsTo(CustomerCar::class, 'customer_car_id', 'id');
    }
}
