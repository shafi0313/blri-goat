<?php

use App\Models\AnimalInfo;

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
