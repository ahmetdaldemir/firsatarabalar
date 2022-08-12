<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
    use HasFactory,SoftDeletes;
    use HasApiTokens,  Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password'
     ];

    public function customer_cars()
    {
        return $this->belongsTo(CustomerCar::class,'customer_id','id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function town()
    {
        return $this->belongsTo(Town::class,'town_id','id');
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
