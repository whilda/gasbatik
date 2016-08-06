<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'items';
	protected $fillable = [
			'code',
			'vendor_id',
			'type_id',
			'material_id',
			'note',
			'purchase_price',
			'sell_price',
			'quantity',	
	];
	public static $rules = array(
			'code' => 'required',
			'vendor_id' => 'required',
			'type_id' => 'required',
			'material_id' => 'required',
			'note' => 'required',
			'purchase_price' => 'required',
			'sell_price' => 'required',
			'quantity' => 'required'
	);
	public static $rulesStock = array(
			'item_id' => 'required',
			'purchase_price' => 'required',
			'sell_price' => 'required',
			'quantity' => 'required'
	);
	public function vendor()
	{
		return $this->belongsTo('App\Vendor','vendor_id');
	}
	public function type()
	{
		return $this->belongsTo('App\Type','type_id');
	}
	public function material()
	{
		return $this->belongsTo('App\Material','material_id');
	}
}
