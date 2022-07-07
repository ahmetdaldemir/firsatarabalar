<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;

    public function customer_cars()
    {
        return $this->belongsTo(CustomerCar::class,'customer_id','id');
    }


    public function comments()
    {
        return $this->belongsTo(CustomerMessage::class,'customer_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


}
