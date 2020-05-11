<?php

namespace App;

use App\FoodType;
use App\RestaurantUser;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
    	'id',
    	'restaurant_name',
    	'rfc'
    ];

    public function branchOffices()
    {
        return $this->hasMany(BranchOffice::class);
    }

    public function restaurantUsers()
    {
        return $this->hasMany(RestaurantUser::class);
    }

    public function foodTypes()
    {
        return $this->hasMany(FoodType::class);
    }
}
