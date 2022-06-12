<?php

namespace App\Models;

use App\Enums\BodyType;
use App\Enums\FullType;
use App\Enums\Transmission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory,SoftDeletes;

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function fuel()
    {
      return  FullType::FullType[$this->fueltype];
    }

    public function body()
    {
        return  BodyType::BodyType[$this->bodytype];
    }

    public function transmission()
    {
        return  Transmission::Transmission[$this->transmission];
    }


}
