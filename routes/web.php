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
    App::setLocale("en");
    return view('welcome');
});
Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('welcome');
});

Route::resource('/result','InvesticatedPersonController',[
    'names' => [
        'store_locale'=>'store-locale',
        'create' => 'create-test',
        'store' => 'save-test',
        'destroy' => 'delete-test',
        'show' => 'show-test',
        'edit' => 'edit-test',
    ]
]);

