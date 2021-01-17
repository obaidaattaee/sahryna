<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
use SoftDeletes ;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $date = ['delete_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'user_name' , 'my_message' , 'inbox'
    ] ;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function advertisements(){
        return in_array(2 , auth()->user()->roles->pluck('id')->toArray()) ? $this->hasMany(BuyerAdvertisement::class) : $this->hasMany(Advertisement::class);
    }
    public function getUserNameAttribute(){
        return $this->attributes['first_name'] . " " .$this->attributes['last_name'] ;
    }
    public function getMyMessageAttribute(){
        return $this->hasMany(Message::class , 'from' , 'id');
    }
    public function getInboxAttribute(){
        return $this->hasMany(Message::class , 'to' , 'id');
    }
    public function users_advertisements(){
        return $this->belongsToMany(Advertisement::class , 'users_advertisements' ,'user_id' , 'advertisement_id' );
    }
    public function likes(){
        return $this->belongsToMany(Advertisement::class , 'user_like_advertisements' ,'user_id' , 'advertisement_id' );
    }
    public function contributes(){
        return $this->hasMany(UserAdvertisement::class ,'user_id' , 'id' );
    }
}
