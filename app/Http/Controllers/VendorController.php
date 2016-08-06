<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use App\Vendor;

class VendorController extends Controller
{
 	public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
    *   @url    : ./vendor
    *   @method : GET
    */
    public function GetView()
    {
    	return View('vendor',['vendors' => Vendor::all()]);
    }
    
    /*
    *   @url    : ./vendor
    *   @method : POST
    */
    public function Save()
    {
    	$input = Input::all();
    	$validation = Validator::make($input, Vendor::$rules);
    	if ($validation->passes())
    	{
    		Vendor::create($input);
    		return $this->GetView();
    	}
    	else
    	{
    		return $this->GetView()->withErrors($validation);
    	}
    }
}
