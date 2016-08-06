<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $table = 'vendors';
	protected $fillable = [
			'name'
	];
	public static $rules = array(
			'name' => 'required|min:5'
	);
	public function item()
	{
		return $this->hasMany('App\Item');
	}
}