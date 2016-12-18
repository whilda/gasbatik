<?php

namespace App\Http\Controllers;

use App\Item;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testing_purpose()
    {
        
    }

    /*
    *   url    : ./home
    *   method : GET 
    */
    public function GetView()
    {
        return view('home', $this->PrepareData());
    }
    /* ==================================================================================================== */
    public function PrepareData(){
        $revenue = $this->CalcRevenue();
        return [
                'items' => $this->LowStockItem(), 
                'asset' => $this->CalcAsset(),
                'quantity' => $this->CalcQty(),
                'sold' => $this->CalcSoldSofar(),
                'now_gross' => $revenue[0]->total,
                'now_net' => $revenue[0]->profit,
                'prev_gross' => $revenue[1]->total,
                'prev_net' => $revenue[1]->profit,
                ];
    }
    public function LowStockItem(){
        return Item::where('quantity','<','5')->get();
    }
    public function CalcAsset(){
        $query = 'select SUM(X.A) as asset from (select (purchase_price * quantity) as A from items) as X';
        return DB::select($query)[0]->asset;
    }
    public function CalcQty(){
        $query = 'select SUM(quantity) as sum from items';
        return DB::select($query)[0]->sum;
    }
    public function CalcSoldSofar(){
        $query = 'select SUM(qty) as sum from detail_transactions';
        return DB::select($query)[0]->sum;
    }
    public function CalcRevenue(){
        $query = 'select t.trans_date,sum(t.total) as total, sum(t.profit) as profit, MONTH(t.trans_date) as month_, YEAR(t.trans_date) as year_ from transactions as t group by year_,month_ ORDER BY t.trans_date DESC LIMIT 2';
        return DB::select($query);
    }
    public function CalcStock(){
        $query = 'select h.created_at, sum(h.quantity * h.purchase_price) as total, MONTH(h.created_at) as month_, YEAR(h.created_at) as year_ from item_histories as h group by year_,month_ having month_ = '.date("m");
        return DB::select($query);
    }
}
