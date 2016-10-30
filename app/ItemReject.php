<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReject extends Model
{
    protected $table = 'item_reject';
	protected $fillable = [
			'item_id',
			'qty'
	];
}
