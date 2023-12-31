<?php

namespace Database\Seeders;

use App\Models\AnimalInfo;
use Illuminate\Database\Seeder;

class AnimalInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'farm_id' => 1,
                'community_cat_id' => null,
                'community_id' => null,
                'animal_cat_id' => 7,
                'animal_sub_cat_id' => null,
                'animal_tag' => 4001,
                'type' => 1,
                'm_type' => 1,
                'sire' => 104,
                'dam' => 3579,
                'breed' => 'BBG',
                'color' => null,
                'sex' => 'F',
                'birth_wt' => 1.3,
                'litter_size' => 'single',
                'generation' => 2,
                'paity' => null,
                'dam_milk' => null,
                'd_o_b' => '2017-06-20',
                'season_o_birth' => 'Summer',
                'death_date' => null,
                'remark' => 'Dead',
                'castrated' => null,
            ],
            [
                'farm_id' => 1,
                'community_cat_id' => null,
                'community_id' => null,
                'animal_cat_id' => 7,
                'animal_sub_cat_id' => null,
                'animal_tag' => 4002,
                'type' => 1,
                'm_type' => 1,
                'sire' => 104,
                'dam' => 3579,
                'breed' => 'BBG',
                'color' => null,
                'sex' => 'F',
                'birth_wt' => 1.3,
                'litter_size' => 'triplet',
                'generation' => 1,
                'paity' => null,
                'dam_milk' => null,
                'd_o_b' => '2017-06-21',
                'season_o_birth' => 'Summer',
                'death_date' => null,
                'remark' => null,
                'castrated' => null,
            ],
            [
                'farm_id' => 1,
                'community_cat_id' => null,
                'community_id' => null,
                'animal_cat_id' => 7,
                'animal_sub_cat_id' => null,
                'animal_tag' => 4003,
                'type' => 1,
                'm_type' => 1,
                'sire' => 104,
                'dam' => 3275,
                'breed' => 'BBG',
                'color' => null,
                'sex' => 'M',
                'birth_wt' => 1.3,
                'litter_size' => 'triplet',
                'generation' => 4,
                'paity' => null,
                'dam_milk' => null,
                'd_o_b' => '2017-06-27',
                'season_o_birth' => 'Summer',
                'death_date' => null,
                'remark' => null,
                'castrated' => null,
            ],
            [
                'farm_id' => 1,
                'community_cat_id' => null,
                'community_id' => null,
                'animal_cat_id' => 7,
                'animal_sub_cat_id' => null,
                'animal_tag' => 4004,
                'type' => 1,
                'm_type' => 1,
                'sire' => 104,
                'dam' => 3275,
                'breed' => 'BBG',
                'color' => null,
                'sex' => 'F',
                'birth_wt' => 1.2,
                'litter_size' => 'triplet',
                'generation' => 4,
                'paity' => null,
                'dam_milk' => null,
                'd_o_b' => '2017-06-27',
                'season_o_birth' => 'Summer',
                'death_date' => null,
                'remark' => null,
                'castrated' => null,
            ],
            [
                'farm_id' => 1,
                'community_cat_id' => null,
                'community_id' => null,
                'animal_cat_id' => 7,
                'animal_sub_cat_id' => null,
                'animal_tag' => 4005,
                'type' => 1,
                'm_type' => 1,
                'sire' => 104,
                'dam' => 3275,
                'breed' => 'BBG',
                'color' => null,
                'sex' => 'F',
                'birth_wt' => .8,
                'litter_size' => 'triplet',
                'generation' => 4,
                'paity' => null,
                'dam_milk' => null,
                'd_o_b' => '2017-06-27',
                'season_o_birth' => 'Summer',
                'death_date' => null,
                'remark' => 'Dead',
                'castrated' => null,
            ],
            [
                'farm_id' => 1,
                'community_cat_id' => null,
                'community_id' => null,
                'animal_cat_id' => 7,
                'animal_sub_cat_id' => null,
                'animal_tag' => 4006,
                'type' => 1,
                'm_type' => 1,
                'sire' => 102,
                'dam' => 3211,
                'breed' => 'BBG',
                'color' => null,
                'sex' => 'M',
                'birth_wt' => 1.5,
                'litter_size' => 'triplet',
                'generation' => 2,
                'paity' => null,
                'dam_milk' => null,
                'd_o_b' => '2017-04-07',
                'season_o_birth' => 'Rainy',
                'death_date' => null,
                'remark' => 'Dead',
                'castrated' => null,
            ],
            [
                'farm_id' => 1,
                'community_cat_id' => null,
                'community_id' => null,
                'animal_cat_id' => 7,
                'animal_sub_cat_id' => null,
                'animal_tag' => 4007,
                'type' => 1,
                'm_type' => 1,
                'sire' => 102,
                'dam' => 3211,
                'breed' => 'BBG',
                'color' => null,
                'sex' => 'M',
                'birth_wt' => 1.4,
                'litter_size' => 'triplet',
                'generation' => 2,
                'paity' => null,
                'dam_milk' => null,
                'd_o_b' => '2017-04-07',
                'season_o_birth' => 'Rainy',
                'death_date' => null,
                'remark' => 'Dead',
                'castrated' => null,
            ],
        ];
        AnimalInfo::insert($user);
    }
}
