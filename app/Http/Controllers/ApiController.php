<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use App\Vendor;
use App\Type;
use App\Material;
use App\Item;
use App\Transaction;
use App\AssetHistory;

class ApiController extends Controller
{
 	public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
    *   url    : ./api/vendor
    *   method : GET
    */
    public function GetVendor()
    {
    	return Vendor::all();
    }

    /*
    *   url    : ./api/type
    *   method : get
    */
    public function GetType()
    {
        return Type::all();
    }

    /*
    *   url    : ./api/material
    *   method : get
    */
    public function GetMaterial()
    {
        return Material::all();
    }

    /*
    *   url    : ./api/item/{id}
    *   method : get
    */
    public function GetItem($id)
    {
        $item = Item::where("id",$id)->first();
        $json_obj = array(
                'vendor'        => $item->vendor->name,
                'type'          => $item->type->name,
                'material'      => $item->material->name,
                'note'          => $item->note,
                'purchase_price' => $item->purchase_price,
                'sell_price'    => $item->sell_price,
                'quantity'      => $item->quantity,
        );
        return json_encode($json_obj);
    }

    /*
    *   url    : ./api/trans
    *   method : get
    */
    public function GetTransaction()
    {
        $ret = array();
        foreach (Transaction::all() as  $trans) {
            $trans->items;
            array_push($ret, $trans);
        }
        return array('data' => $ret);
    }    

    /*
    *   url    : ./api/asset_history
    *   method : get
    */
    public function GetAssetHistory()
    {
        $asset_histories = AssetHistory::all();
        $output = array();
        foreach ($asset_histories as $a){
            $date = date_parse($a->created_at);
            array_push($output,[mktime(0,0,0,$date['month'],$date['day'],$date['year'])*1000,$a->asset]);
        }
        echo json_encode($output);
    }
}
