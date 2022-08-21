<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEarning extends Model
{

    protected $fillable = ['customer_car_id','user_id',
'valuation_id',
'earning',
'comments',
'status'];
    use HasFactory;
}
