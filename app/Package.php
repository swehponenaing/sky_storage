<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'storage_amount', 'price'];

    public function users($value='')
	{
		return $this->belongsToMany('App\User')
							 ->withTimestamps();
	}
}


