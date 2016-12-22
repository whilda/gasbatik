<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use DB;
use DateTime;
use App\Item;
use App\Vendor;
use App\Type;
use App\Material;
use App\ItemHistory;
use App\ItemReject;
use App\Transaction;

class ItemController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function PrepareData(){
    	return ['vendors' => Vendor::all(), 'types' => Type::all(), 'materials' => Material::all()];
    }
    
    /* ===============================================================================================
    *   url    : ./item_data
    *   method : GET
    *  ===============================================================================================
    */
    public function GetDataView()
    {
        return View('item_data', ['items' => Item::all()]);
    }

    /* ===============================================================================================
    * url    : ./item_input
    * method : GET
    *  ===============================================================================================
    */
    public function GetInputView()
    {
    	return View('item_input', $this->PrepareData());
    }
    
    /*
    * url    : ./item_input
    * method : POST
    */
    public function Save()
    {
    	$input = Input::all();
    	$validation = Validator::make($input, Item::$rules);
    	if (!$validation->passes())
    		return View('item_input',$this->PrepareData())
    			->with('inputs', $input)
	    		->withErrors($validation);
    	
    	$is_id_exist = Item::where("code",$input['code'])->count();
    	if($is_id_exist == 1)
    		return View('item_input', $this->PrepareData())
    			->with('inputs', $input)
    			->withErrors("Code is already exist");
    	
    	if(Input::get('vendor_id') == '-')
    		return View('item_input', $this->PrepareData())
    			->with('inputs', $input)
    			->withErrors("Must choose vendor");
    	
    	if(Input::get('type_id') == '-')
    		return View('item_inputm', $this->PrepareData())
    			->with('inputs', $input)
    			->withErrors("Must choose type");
    
    	if(Input::get('material_id') == '-')
    		return View('item_inputem', $this->PrepareData())
    			->with('inputs', $input)
    			->withErrors("Must choose material");
    	
   		$item = Item::create($input);
   		$itemHist = array(
   				'item_id' => $item->id,
   				'purchase_price' => $item->purchase_price,
   				'sell_price' => $item->sell_price,
   		);
   		ItemHistory::create($itemHist);
   		return View('item_input', $this->PrepareData())->with('success', 'ok');
    }
    
    /* ===============================================================================================
    * url    : ./stock
    * method : GET
    *  ===============================================================================================
    */
    public function GetStockView()
    {
        return View('stock_data', ["ItemsHistories" => ItemHistory::all()->sortBy('created_at')]);
    }
    /*
    * url    : ./stock_input
    * method : POST
    */

    public function GetStockInput()
    {
        return View('stock_input', ["items" => Item::all()]);
    }
    /*
    * url    : ./stock
    * method : POST
    */
    public function SaveStockInput(){
    	$input = Input::all();
    	if(Input::get('item_id') == '-')
    		return $this->GetStockView()
    		->with('inputs', $input)
    		->withErrors("Must choose Item");
    	
    	$validation = Validator::make($input, Item::$rulesStock);
    	if (!$validation->passes())
    		return $this->GetStockView()
    		->with('inputs', $input)
    		->withErrors($validation);
    	
    	$itemHist = array(
    			'item_id'		=> Input::get('item_id'),
                'quantity'       => Input::get('quantity'),
    			'purchase_price' => Input::get('purchase_price'),
    			'sell_price'	=> Input::get('sell_price'),
    	);
    	ItemHistory::create($itemHist);
    	
    	$item = Item::find(Input::get('item_id'));
    	$item->purchase_price = Input::get('purchase_price');
    	$item->sell_price = Input::get('sell_price');
    	$item->quantity +=  Input::get('quantity');
    	$item->save();
    	
    	return $this->GetStockView()->with('success', 'ok');
    }
    
    /* ===============================================================================================
    * url    : ./trans_data
    * method : GET
    *  ===============================================================================================
    */
    public function GetTransDataView()
    {
    	return View('trans_data');
    }
    /* 
    * url    : ./trans_input
    * method : GET
    */
    public function GetTransInputView()
    {
        return View('trans_input', ["items" => Item::all()]);
    }
    /* 
    * url    : ./trans_input
    * method : POST
    */
    public function SaveTransaction(){
DB::transaction(function () {
    	/* Insert transaction */
    	$transaction_input = array(
    			'customer' 		=> Input::get('cust_name'),
    			'trans_date' 	=> DateTime::createFromFormat('m/d/Y', Input::get('trans_date')),
    			'total' 		=> Input::get('total'),
    	);
    	$transaction = Transaction::create($transaction_input);
    	$total_profit=0;
    	
    	$num = (int)Input::get('num');

		/* attach detail transaction */
    	for($i = 1; $i <= $num ; $i++){
    		$item		= Item::find(Input::get('ID'.$i.'_item'));
    		$unit_prof	= (Input::get('ID'.$i.'_unit_price') - $item->purchase_price);
    		$sum_prof	= $unit_prof * Input::get('ID'.$i.'_qty');
    		$total_profit += $sum_prof;
    		$detail = array(
    			'qty'			=> Input::get('ID'.$i.'_qty'),
    			'note'			=> Input::get('ID'.$i.'_note'),
    			'unit_price'	=> Input::get('ID'.$i.'_unit_price'),
    			'unit_profit'	=> $unit_prof,
    			'sum_price'		=> Input::get('ID'.$i.'_sum'),
    			'sum_profit'	=> $sum_prof ,
    		);
    		$transaction->items()->attach(Input::get('ID'.$i.'_item'), $detail);
    		
    		$item->quantity -=  (int)Input::get('ID'.$i.'_qty'); 
    		$item->save();
    	}
    	
    	/*Update profit */
    	$transaction->profit = $total_profit;
    	$transaction->save();
});
	return View('trans_input', ["items" => Item::all()])->with('success', 'ok');
    }
    /* ===============================================================================================
    * url    : ./trans_reject
    * method : GET
    *  ===============================================================================================
    */
    public function GetTransRejectView()
    {
        return View('trans_reject');
    }
        /*
    * url    : ./trans_reject
    * method : GET
    */
    public function GetTransRejectWithIdView($id)
    {
        return View('trans_reject', ["trans_items" => Transaction::find($id)]);
    }
    /* 
    * url    : ./trans_reject
    * method : POST
    */
    public function SaveReject(){
DB::transaction(function () {
        $total = 0;
        $profit = 0;
        $transaction = Transaction::find(Input::get("id"));
        foreach ($transaction->items as $item) {
            $reject_qty = Input::get($item->id);
            if ($reject_qty > 0) {
                /* Update pivot */
                $new_qty = ($item->pivot->qty - $reject_qty);
                $new_total = $item->pivot->unit_price * $new_qty;
                $new_profit = $item->pivot->unit_profit * $new_qty;
                $detail = array(
                    'qty'           => $new_qty,
                    'note'          => $item->pivot->note,
                    'unit_price'    => $item->pivot->unit_price,
                    'unit_profit'   => $item->pivot->unit_profit,
                    'sum_price'     => $new_total,
                    'sum_profit'    => $new_profit,
                );
                $transaction->items()->updateExistingPivot($item->id, $detail);
                /* Update item */
                $real_item = Item::find($item->id);
                $real_item->quantity += $reject_qty;
                $real_item->save();
                /* Insert Item Reject */
                $itemReject = array(
                        'item_id'   => $item->id,
                        'qty'       => $reject_qty,
                );
                ItemReject::create($itemReject);
                /* Calc */
                $total += $new_total;
                $profit += $new_profit;
            } else {
                $total += $item->pivot->sum_price;
                $profit += $item->pivot->sum_profit;
            }
        }
        $transaction->total = $total;
        $transaction->profit = $profit;
        $transaction->save();

});
        return View('trans_reject', ["trans_items" => Transaction::find(Input::get("id"))])->with("success","ok");
    }
}
