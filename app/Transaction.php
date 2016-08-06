<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
    		'customer',
    		'trans_date',
    		'total',
    		'profit',
    ];
    public static $rules = array(
    		'customer' => 'required',
    		'trans_date' => 'required',
    		'total' => 'required',
    		'profit' => 'required',    		
    );
    public function items()
    {
    	return $this->belongsToMany('App\Item','detail_transactions','trans_id','item_id')
    		->withPivot('qty', 'unit_price','unit_profit','note','sum_price','sum_profit')
    		->withTimestamps();
    }
}
