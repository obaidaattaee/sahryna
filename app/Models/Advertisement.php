<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    protected $date = [
        'publish_date' , 'end_publish_date'
    ] ;

    protected $appends = ['cost_of_share'] ;

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function subscription(){
        return $this->belongsTo(Subscription::class , 'subscription_id' , 'id');
    }
    public function advertisementType(){
        return $this->belongsTo(AdvertisementType::class , 'advertisement_type_id' , 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }
    public function city(){
        return $this->belongsTo(City::class , 'city_id' , 'id');
    }
    public function deleveiryTime(){
        return $this->belongsTo(DeliveryTime::class , 'delivery_time_id' , 'id');
    }
    public function getCostOfShareAttribute(){
        $cost = $this["distribute_cost"] == 1 ? $this["cost"] : 0  ;
        $price_of_share = ($this["wholesale_price"] + $cost) / $this["number_of_partners"] ;
        return $price_of_share ;
    }
}
