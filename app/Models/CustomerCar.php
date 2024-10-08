<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerCar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['customer_id', 'session_id', 'customer_id',
        'caryear',
        'body',
        'fuel',
        'gear',
        'custom_version',
        'car_id',
        'km',
        'color',
        'plate',
        'ownorder',
        'car_city',
        'car_state',
        'description',
        'laststep'];
    protected $casts = [
        'damage' => 'array'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo(Customer::class, 'buyer_id', 'id');
    }

    public function expert()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(CustomerCarComment::class);
    }

    public function photo()
    {
        return $this->hasMany(CustomerCarPhoto::class);
    }

    public function video()
    {
        return $this->belongsTo(CustomerCarVideo::class, 'customer_car_id', 'id');
    }

    public function exper()
    {
        return $this->hasMany(CustomerCarExper::class);
    }

    public function valuation()
    {
        return $this->hasMany(CustomerCarValuation::class);
    }

    public function payment()
    {
        return $this->belongsTo(CustomerCarPaymentTransaction::class, 'id', 'customer_car_id');
    }


    public function cities()
    {
        return $this->belongsTo(City::class, 'car_city', 'id');
    }


    public function state()
    {
        return $this->belongsTo(Town::class, 'car_state', 'id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'color', 'id');
    }
}
