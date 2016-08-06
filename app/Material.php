<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
	protected $table = 'materials';
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
