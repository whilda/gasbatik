<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| It's a breeze. Simply tell Laravel the URIs it should respond to
| Here is where you can register all of the routes for an application.
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::auth();
Route::get('/home', 'HomeController@GetView');
/* API */
Route::get('/api/vendor', 'ApiController@GetVendor');
Route::get('/api/type', 'ApiController@GetType');
Route::get('/api/material', 'ApiController@GetMaterial');
Route::get('/api/item/{id}', 'ApiController@GetItem');
Route::get('/api/transaction', 'ApiController@GetTransaction');
/* Vendor */
Route::get('/vendor', 'VendorController@GetView');
Route::post('/vendor', 'VendorController@Save');
/* Type */
Route::get('/type', 'TypeController@GetView');
Route::post('/type', 'TypeController@Save');
/* Material */
Route::get('/material', 'MaterialController@GetView');
Route::post('/material', 'MaterialController@Save');
/* Item */
Route::get('/item_data', 'ItemController@GetDataView');
Route::get('/item_input', 'ItemController@GetInputView');
Route::post('/item_input', 'ItemController@Save');
/* Stock */
Route::get('/stock', 'ItemController@GetStockView');
Route::post('/stock', 'ItemController@SaveStock');
/* Transaction */
Route::get('/trans_data', 'ItemController@GetTransDataView');
Route::get('/trans_input', 'ItemController@GetTransInputView');
Route::post('/trans_input', 'ItemController@SaveTransaction');
