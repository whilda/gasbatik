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
        return [
                'items' => $this->LowStockItem(), 
                'asset' => $this->CalcAsset(),
                'quantity' => $this->CalcQty(),
                'sold' => $this->CalcSoldSofar(),
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
}
