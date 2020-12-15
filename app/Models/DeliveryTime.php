<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'time_day' , 'description', 'active' ,
    ];
    public function advertisements(){
        return $this->hasMany(Advertisement::class , 'id' , 'delivery_time_id');
    }
}
