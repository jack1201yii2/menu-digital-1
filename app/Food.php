<?php

namespace App;

use App\FoodType;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
    	'id',
		'food_name',
		'food_price',
		'food_description',
		'food_type_id',
    ];

    public function foodType()
    {
        return $this->belongsTo(FoodType::class);
    }
}
