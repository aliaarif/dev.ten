<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	public function cities(){
		return $this->hasMany('App\City');
	}

	public function country(){
		return $this->belongsTo('App\Country');
	}

	public function state(){
		return $this->belongsTo('App\State');
	}

	
}
