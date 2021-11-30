<?php

use App\Models\AnimalInfo;
use Illuminate\Support\Facades\Auth;

if (!function_exists('float2')) {
    function float2($data)
    {
        return number_format($data,2);
    }
}


if (!function_exists('animalType')) {
    function animalType($type)
    {
        return $type==1?'Goat':'Sheep';
    }
}


if (!function_exists('getAnimalInfo')) {
    function getAnimalInfo(){
        if (Auth::user()->is==1) {
            return AnimalInfo::whereStatus(0)->get();
        }else{
            return AnimalInfo::whereUser_id(Auth::user()->id)->whereStatus(0)->get();
        }
    }
}


if(!function_exists('bdDate'))
{
    function bdDate($bdDate)
    {
        return \Carbon\Carbon::parse($bdDate)->format('d/m/Y');
    }
}

if(!function_exists('nextDate'))
{
    function nextDate($date,$add)
    {
        return \Carbon\Carbon::parse($date)->addDays($add)->format('d/m/Y');
    }
}

// if(!function_exists('age'))
// {
//     function age($date,$add)
//     {
//         return \Carbon\Carbon::parse($date)->addDays($add)->format('d/m/Y');
//     }
// }

if (!function_exists('animalKid')) {
    function animalKid($to_date)
    {
        $getAnimalDOBs = AnimalInfo::all();
        $animalDOB =[];
        foreach ($getAnimalDOBs as $key =>  $getAnimalDOB) {
            $data = \Carbon\Carbon::parse($getAnimalDOB->d_o_b)->diff($to_date)->format('%y%m');
            if ($data < 4) {
               $animalDOB[] += $getAnimalDOB->id;
            }
        }
        return $animalDOB;
    }
}

if (!function_exists('animalGrowing')) {
    function animalGrowing($to_date)
    {
        $getAnimalDOBs = AnimalInfo::all();
        $animalDOB =[];
        foreach ($getAnimalDOBs as $key =>  $getAnimalDOB) {
            $data = \Carbon\Carbon::parse($getAnimalDOB->d_o_b)->diff($to_date)->format('%y%m');
            if ($data > 3 && $data < 8) {
               $animalDOB[] += $getAnimalDOB->id;
            }
        }
        return $animalDOB;
    }
}

if (!function_exists('animalAdult')) {
    function animalAdult($to_date)
    {
        $getAnimalDOBs = AnimalInfo::all();
        $animalDOB =[];
        foreach ($getAnimalDOBs as $key =>  $getAnimalDOB) {
            $data = \Carbon\Carbon::parse($getAnimalDOB->d_o_b)->diff($to_date)->format('%y%m');
            if ($data > 7) {
               $animalDOB[] += $getAnimalDOB->id;
            }
        }
        return $animalDOB;
    }
}
