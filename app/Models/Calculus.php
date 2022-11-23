<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculus extends Model
{
    use HasFactory;

    public function getProfit($a)
    {
        //profit index
        //$a will be the quantity of months, calculated in Models\Months
        $profitIndex=1.0052**$a;

        return($profitIndex);
    }

    public function getTax($a)
    {
        //tax calculation
        //$a will be the quantity of months, calculated in Models\Months
        $tax=1;
        if($a<12)
        {
            $tax=0.775;
        }
        if($a>=12 and $a<24)
        {
            $tax=0.815;
        }
        if($a>24)
        {
            $tax=0.85;
        }

        return($tax);
    }
}
