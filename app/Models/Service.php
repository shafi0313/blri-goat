<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function animalInfo()
    {
        return $this->belongsTo(AnimalInfo::class);
    }

    public function buckTag()
    {
        return $this->belongsTo(AnimalInfo::class, 'buck_tag');
    }

    public function doeTag()
    {
        return $this->belongsTo(AnimalInfo::class, 'doe_tag');
    }
}
