<?php

namespace App\Actions;

use App\Models\AnimalInfo;

class FarmOrCommunityData
{
    public static function getFarmOrCommunityData($animalId){
        $animalInfo = AnimalInfo::whereId($animalId)->first();
        $data['farm_id'] = $animalInfo->farm_id;
        $data['community_cat_id'] = $animalInfo->community_cat_id;
        $data['community_id'] = $animalInfo->community_id;

        return $data;
    }
}
