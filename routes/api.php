<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['auth:api']], function() {
    //update user firebase token
    Route::post('/user/update_firebase_token', 'UserController@update_firebase_token');

    // form requests
    Route::get('/get_request_forms', 'RequestController@get_request_forms');
    Route::get('/get_updated_request_forms', 'RequestController@get_updated_request_forms');
    Route::post('/update_request_status', 'RequestController@update_request_status');

        // To get all receipts or filtered by get paramenter
        Route::get('/receipts','ReceiptController@index');

        // To get all payments  or filtered by get paramenter
        Route::get('/payments','PaymentController@index');

        // To get all cheques  or filtered by get paramenter
        Route::get('/cheques','ChequesController@index');
});

