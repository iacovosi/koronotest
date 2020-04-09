<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $locale = App::getLocale();
    if (empty($locale)) {
        App::setLocale("en");
    }
    return view('welcome');
});

Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('welcome');
});

Route::get('/unique_id/{id}', function ($unique_id) {
    $locale = App::getLocale();
    if (empty($locale)) {
        App::setLocale("en");
    }
    return view('welcome')->with('unique_identification', $unique_id);;
});

Route::get('/{locale}/unique_id/{id}', function ($locale, $unique_id) {
    App::setLocale($locale);
    return view('welcome')->with('unique_identification', $unique_id);;
});

Route::post('/{locale}', ['as' => 'save-test', 'uses' => 'InvesticatedPersonController@store']);
