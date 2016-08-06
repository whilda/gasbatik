<?php

namespace App\Http\Controllers;

use App\AssetHistory;
use App\Item;
use App\Vendor;
use App\Type;
use App\Material;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testing_purpose()
    {
    	
    }
    
    public function api_asset()
    {
    	$asset_histories = AssetHistory::all();
    	$output = array();
    	foreach ($asset_histories as $a){
    		$date = date_parse($a->created_at);
    		array_push($output,[mktime(0,0,0,$date['month'],$date['day'],$date['year'])*1000,$a->asset]);
    	}
    	echo json_encode($output);
    }
    
    public function api_item()
    {
    	$items = Item::all();
    	$output = array();
    	foreach ($items as $a){
    		$item['code'] = $a->code;
    		$item['vendor'] = $a->vendor->name;
    		$item['type'] = $a->type->name;
    		$item['material'] = $a->material->name;
    		$item['note'] = $a->note;
    		$item['purchase'] = $a->purchase_price;
    		$item['sell'] = $a->sell_price;
    		$item['quantity'] = $a->quantity;
    		array_push($output,$item);
    	}
    	echo json_encode($output);
    }
    
    public function api_vendor()
    {
    	$vendors = Vendor::all();
    	$output = array();
    	foreach ($vendors as $a){
    		array_push($output,$a);
    	}
    	echo json_encode($output);
    }
    
    public function api_type()
    {
    	$types = Type::all();
    	$output = array();
    	foreach ($types as $a){
    		array_push($output,$a);
    	}
    	echo json_encode($output);
    }
    
    public function api_material()
    {
    	$materials = Material::all();
    	$output = array();
    	foreach ($materials as $a){
    		array_push($output,$a);
    	}
    	echo json_encode($output);
    }
    
    public function overview()
    {
        return view('overview', $this->PrepareData());
    }
 	
    public function PrepareData(){
    	$query = 'select SUM(X.A) as asset from (select (purchase_price * quantity) as A from items) as X';
    	$asset = DB::select($query)[0]->asset;
    	return ['items' => Item::where('quantity','<','5')->get(), 'asset' => $asset];
    }
}
