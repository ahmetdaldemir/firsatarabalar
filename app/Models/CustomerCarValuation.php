<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCarValuation extends Model
{
    use HasFactory;

    protected $fillable = ['customer_car_id','comment','link1','link1_comment','link2','link2_comment','link3','link3_comment','link4','link4_comment','link5','link5_comment','offer_price','status','is_confirm'];

    public function customer_car()
    {
        return $this->belongsTo(CustomerCar::class,'customer_car_id','id');
    }
}
