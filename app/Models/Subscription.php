<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [] ;
    public function advertisements(){
        return $this->hasMany(Advertisement::class , 'id' , 'subscription_id');
    }

    public function role(){
        return $this->belongsTo(Role::class , 'role_id' , 'id');
    }
}
