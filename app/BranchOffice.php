<?php

namespace App;

use App\User;
use App\UserBranchOffice;
use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $fillable = [
    	'id',
    	'branch_office_name',
    	'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
