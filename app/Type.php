<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $table = 'types';
	protected $fillable = [
			'name'
	];
	public static $rules = array(
			'name' => 'required|min:3'
	);
	public function item()
	{
		return $this->hasMany('App\Item');
	}
}
