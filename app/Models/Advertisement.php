<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use HasFactory;
use SoftDeletes ;
    protected $guarded = [] ;

    protected $date = [
        'publish_date' , 'end_publish_date'
    ] ;

    protected $appends = ['cost_of_share' , 'reminnig_contributes' , 'status'] ;

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
    public function country(){
        return $this->belongsTo(Country::class , 'country_id' , 'id');
    }
    public function deleveiryTime(){
        return $this->belongsTo(DeliveryTime::class , 'delivery_time_id' , 'id');
    }
    public function getCostOfShareAttribute(){
        $cost = $this["distribute_cost"] == 1 ? $this["cost"] : 0  ;
        $price_of_share = ($this["wholesale_price"] + $cost) / $this["number_of_partners"] ;
        return $price_of_share ;
    }
    public function userSubscriptions(){
        return $this->belongsToMany(User::class , 'users_advertisements' , 'advertisement_id' , 'user_id');
    }
    public function likes(){
        return $this->belongsToMany(User::class , 'user_like_advertisements' , 'advertisement_id' , 'user_id');
    }
    public function contributes (){
        return $this->hasMany(UserAdvertisement::class  , 'advertisement_id' , 'id');
    }
    public function getReminnigContributesAttribute(){
        return $this->attributes['number_of_partners'] - $this->contributes()->sum('number_of_parts') ;
    }
    public function getStatusAttribute(){
        return $this->attributes['active'] == 1 && $this->attributes['verified'] == 1 && $this->end_publish_date > Carbon::now() ? 1 : 0 ;
    }

}
