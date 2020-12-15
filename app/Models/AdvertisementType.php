<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementType extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function advertisements(){
        return $this->hasMany(Advertisement::class , 'id' , 'advertisement_type_id');
    }
}
