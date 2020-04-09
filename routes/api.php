<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/records/store', ['as' => 'store-test', 'uses' => 'InvesticatedPersonController@storeAPI']);
Route::post('/records/{locale}/store', ['as' => 'store-test', 'uses' => 'InvesticatedPersonController@storeAPILocale']);
Route::get('/records/getRecords/', ['as' => 'getRecords-test', 'uses' => 'InvesticatedPersonController@getRecordsAPI']);
Route::get('/records/getRecords/Unique_id/{id}', ['as' => 'getRecords-test-unique_id', 'uses' => 'InvesticatedPersonController@getRecordAPIForSpecificUnique_identifier']);