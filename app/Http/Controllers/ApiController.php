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
        $rev = (new HomeController)->CalcRevenue();
        $stock = (new HomeController)->CalcStock();
        $last_month_revenue = (count($rev) > 1) ? $rev[1]->total : 0;
        $this_month_stocking = (count($stock) > 0) ? $stock[0]->total : 0;
        $json_obj = array(
                'last_month_revenue'    => $last_month_revenue,
                'this_month_stocking'   => $this_month_stocking,
        );
        return json_encode($json_obj);
    }
    /*
    *   url    : ./api/finance
    *   method : get
    */
    public function GetFinance()
    {
        $query = "select total as gross, profit as net, stock, CONCAT(MONTHNAME(CONCAT('2000-',month1_,'-1')),' ',year1_) as y_
from 
    (select sum(t.total) as total, sum(t.profit) as profit, MONTH(t.trans_date) as month1_, YEAR(t.trans_date) as year1_ from transactions as t group by year1_,month1_ ORDER BY t.trans_date) as revenue
INNER JOIN
    (select sum(ih.quantity * ih.purchase_price) as stock, MONTH(ih.created_at) as month2_, YEAR(ih.created_at) as year2_ from item_histories as ih group by year2_,month2_ ORDER BY ih.created_at) as stock
ON
    revenue.month1_ = stock.month2_ and revenue.year1_ = stock.year2_";
        return DB::select($query);
    }
}
