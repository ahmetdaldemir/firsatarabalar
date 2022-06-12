<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    public function expert_earnings()
    {
        return $this->belongsTo(ExpertEarning::class,'expert_id','id');
    }


    public function expert_earnings_sum()
    {
        $sum = 0;
        $earn = ExpertEarning::where('expert_id',$this->id)->get();
        foreach ($earn as $item)
        {
            $sum += $item->earning;
        }
        return $sum;
    }
}
