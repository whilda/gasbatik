<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use App\Material;

class MaterialController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/*
    *   @url    : ./material
    *   @method : GET
    */
	public function GetView()
	{
		return View('material',['materials' => Material::all()]);
	}
	
	/*
    *   @url    : ./material
    *   @method : POST
    */
	public function Save()
	{
		$input = Input::all();
		$validation = Validator::make($input, Material::$rules);
		if ($validation->passes())
		{
			Material::create($input);
			return $this->GetView();
		}
		else
		{
			return $this->GetView()->withErrors($validation);
		}
	}
}
