<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use DB;
use App\Vendor;
use App\Type;
use App\Material;
use App\Item;
use App\Transaction;
use App\AssetHistory;
use App\Http\Controllers\HomeController;

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
        $asset_histories = DB::Table("asset_histories")->groupBy("asset")->orderBy("id","asc")->get();
        $output = array();
        foreach ($asset_histories as $a){
            $date = date_parse($a->created_at);
            array_push($output,[mktime(0,0,0,$date['month'],$date['day'],$date['year'])*1000,$a->asset]);
        }
        echo json_encode($output);
    }

    /*
    *   url    : ./api/revenue
    *   method : get
    */
    public function GetRevenue()
    {
        $transactions = DB::Table("transactions")
                                ->select(DB::raw("trans_date, sum(total) as total"))
                                ->groupBy("trans_date")
                                ->get();
        $output = array();
        foreach ($transactions as $t){
            $date = date_parse($t->trans_date);
            array_push($output,[mktime(0,0,0,$date['month'],$date['day'],$date['year'])*1000,$t->total]);
        }
        echo json_encode($output);
    }
    /*
    *   url    : ./api/stockgauge
    *   method : get
    */
    public function GetStockGauge()
    {
        $last_month_revenue = (new HomeController)->CalcRevenue()[1]->total;
        $this_month_stocking = (new HomeController)->CalcStock()[0]->total;
        $json_obj = array(
                'last_month_revenue'    => $last_month_revenue,
                'this_month_stocking'   => $this_month_stocking,
        );
        return json_encode($json_obj);
    }
}
