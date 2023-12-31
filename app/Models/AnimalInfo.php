<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnimalInfo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getAnimalInfo()
    {
        return DB::table('animal_infos')->select(['animal_tag','type','sire','dam','color','sex','birth_wt','litter_size','generation','paity','dam_milk','d_o_b','season_d_o_b','remark'])->get();
    }

    public function animalCat()
    {
        return $this->belongsTo(AnimalCat::class, 'animal_cat_id');
    }
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }
    public function communityCat()
    {
        return $this->belongsTo(CommunityCat::class, 'community_cat_id');
    }

    public function diseaseTreatment()
    {
        return $this->hasOne(DiseaseTreatment::class, 'animal_info_id');
    }

    public function death()
    {
        return $this->hasOne(DeadCulled::class, 'animal_info_id');
    }
}
