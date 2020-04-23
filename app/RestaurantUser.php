<?php

namespace App;

use App\User;
use App\Restaurant;
use Illuminate\Database\Eloquent\Model;

class RestaurantUser extends Model
{
    protected $fillable = [
    	'id',
    	'user_id',
    	'restaurant_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
