<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use App\Type;

class TypeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/*
    *   @url    : ./type
    *   @method : GET
    */
	public function GetView()
	{
		return View('type',['types' => Type::all()]);
	}
	
	/*
    *   @url    : ./type
    *   @method : POST
    */
	public function Save()
	{
		$input = Input::all();
		$validation = Validator::make($input, Type::$rules);
		if ($validation->passes())
		{
			Type::create($input);
			return $this->GetView();
		}
		else
		{
			return $this->GetView()->withErrors($validation);
		}
	}
}
