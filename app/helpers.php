<?php

use App\Models\AnimalInfo;

if (!function_exists('d_o_b')) {
    function d_o_b($to_date)
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
