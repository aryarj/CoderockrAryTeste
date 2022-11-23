<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Months extends Model
{
    use HasFactory;

    
    public function getMonth($initialDate)
    {
        //today date
        $today = date('Y/m/d');
        $todayExplode=explode("/",$today);
        $todayDate=date_create("{$todayExplode[0]}/{$todayExplode[1]}/{$todayExplode[2]}");
        //Initialdate
        $initialDateExplode=explode("/",$initialDate);
        $initialDate2=date_create("{$initialDateExplode[2]}/{$initialDateExplode[1]}/{$initialDateExplode[0]}");
        //date difference
        $interval = date_diff($todayDate, $initialDate2);
        //in months and in years
        $months=$interval->m;
        $years=$interval->y;
        $days=$interval->d;
        //in total months
        $totalMonths=round($years*12+$months+$days/30);
        
        return($totalMonths);
    }
}
