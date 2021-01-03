<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdvertisement extends Model{
    use HasFactory;
    protected $table = 'users_advertisements' ;
    protected $guarded = [] ;

    public function advertisement(){
        return $this->belongsTo(Advertisement::class , 'advertisement_id', 'id' );
    }
    public function users(){
        return $this->hasMany(User::class , 'id' , 'user_id');
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id', 'id' );
    }
}
