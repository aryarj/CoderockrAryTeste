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
        ['id'=>10, 'nome'=>'cliente10', 'valorInicial'=>1000, 'initialdate'=>'24/11/2022','gross'=>''],
    ];

    public function calculo(Calculus $calculus, Months $months)
    {   
        //investors data
        $investors=$this->investors;

        //gross value calculation and its rounded from function 'getProfit($a)' in Models/Calculus
        foreach($investors as $i)
        {
            //number of months
            $b=$months->getMonth($i['initialdate']);
            // gross values
            $transport[]=round(($calculus->getProfit($b))*$i['valorInicial'],2);
            //get the numer of months
            $b=$months->getMonth($i['initialdate']);
            //taxes to apply in gross values to obtain net vaules
            $TransportNet[]=$calculus->getTax($b);
            //recording the number of months
            $c[]=$b;
            //recording the initial values
            $initialValues[]=$i['valorInicial'];
        }

        // groos values sum 
        $sumGross=array_sum($transport);

        //net value calculation and its rounded from function 'getTax($a)' in Models/Calculus
        foreach($investors as $i)
        {
            $b=$months->getMonth($i['initialdate']);
            $transportNet[]=$calculus->getTax($b);
            //recording the number of months
            $c[]=$b;

        }

        //net values sum
        $sumNet=0;
        for($i=0; $i<count($transport);$i++)
        {
            // getting the net values
            $transportNet2[]=round(($transport[$i]-$initialValues[$i])*$transportNet[$i]+$initialValues[$i],2);
            // the sum of net values
            $sumNet+=$transportNet2[$i];
        }

        //taxes sum
        $sumTaxes=$sumGross-$sumNet;

        return view('index',compact(['investors','transport','transportNet2','c','sumGross','sumNet','sumTaxes']));
    }
    
    


}
