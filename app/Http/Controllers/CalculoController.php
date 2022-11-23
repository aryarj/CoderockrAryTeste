<?php

namespace App\Http\Controllers;

use App\Models\Calculus;
use App\Models\Months;

class CalculoController extends Controller
{
    //creating an investors list
    private $investors=[
        ['id'=>1, 'nome'=>'cliente1', 'valorInicial'=>1000, 'initialdate'=>'01/01/2000','gross'=>''],
        ['id'=>2, 'nome'=>'cliente2', 'valorInicial'=>1000, 'initialdate'=>'01/01/2005','gross'=>''],
        ['id'=>3, 'nome'=>'cliente3', 'valorInicial'=>1000, 'initialdate'=>'01/01/2010','gross'=>''],
        ['id'=>4, 'nome'=>'cliente4', 'valorInicial'=>1000, 'initialdate'=>'01/01/2015','gross'=>''],
        ['id'=>5, 'nome'=>'cliente5', 'valorInicial'=>1000, 'initialdate'=>'01/01/2021','gross'=>''],
        ['id'=>6, 'nome'=>'cliente6', 'valorInicial'=>1000, 'initialdate'=>'01/03/2022','gross'=>''],
        ['id'=>7, 'nome'=>'cliente7', 'valorInicial'=>1000, 'initialdate'=>'01/05/2022','gross'=>''],
        ['id'=>8, 'nome'=>'cliente8', 'valorInicial'=>1000, 'initialdate'=>'01/07/2022','gross'=>''],
        ['id'=>9, 'nome'=>'cliente9', 'valorInicial'=>1000, 'initialdate'=>'06/10/2022','gross'=>''],
    ];

    public function calculo(Calculus $calculus, Months $months)
    {   
        //investors data
        $investors=$this->investors;

        //gross value calculation and its rounded from function 'getProfit($a)' in Models/Calculus
        foreach($investors as $i)
        {
            $b=$months->getMonth($i['initialdate']);
            $transport[]=round(($calculus->getProfit($b))*$i['valorInicial'],2);
        }

        //net value calculation and its rounded from function 'getTax($a)' in Models/Calculus
        foreach($investors as $i)
        {
            $b=$months->getMonth($i['initialdate']);
            $transportNet[]=$calculus->getTax($b);
            //recording the number of months
            $c[]=$b;
        }
        
        return view('index',compact(['investors','transport','transportNet','c']));
    }
    
    


}
