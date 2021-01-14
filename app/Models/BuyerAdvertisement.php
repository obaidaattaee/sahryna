<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerAdvertisement extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function subscription(){
        return $this->belongsTo(Subscription::class , 'subscription_id' , 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }
    public function city(){
        return $this->belongsTo(City::class , 'city_id' , 'id');
    }
}
