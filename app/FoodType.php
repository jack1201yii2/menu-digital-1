<?php

namespace App;

use App\Food;
use App\Restaurant;
use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $fillable = [
    	'type_name',
    	'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
