<?php

namespace App;

use App\RestaurantUser;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
    	'id',
    	'name_restaurant',
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

    
}
