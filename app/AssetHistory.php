<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetHistory extends Model
{
    protected $table = 'asset_histories';
	protected $fillable = [
			'asset'	
	];
}