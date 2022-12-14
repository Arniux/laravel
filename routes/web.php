<?php


namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;


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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/countries', [CountriesController::class, 'index']);

Route::get('/create-country', function () {
    return view('create-country');
});

Route::get('/airport', [AirportController::class, 'index']);

Route::get('/airport/{id}', [AirportController::class, 'airportsView']);

Route::get('/airport-link-airline/{id}', [AirportController::class, 'viewlinkAirline']);

Route::get('/store-airport-link-airline/{id}', [AirportController::class, 'storeAirportLinkAirline']);

Route::get('/create-airport', [AirportController::class, 'view']);

Route::post('/update-airport-form', [AirportController::class, 'update']);

Route::post('/store-airport-form', [AirportController::class, 'store']);  

Route::get('country-edit/{id}', [CountriesController::class, 'edit']);   

Route::get('airport-edit/{id}', [AirportController::class, 'edit']);   

Route::get('airline-edit/{id}', [AirlinesController::class, 'edit']);  

Route::post('/update-airline-form', [AirlinesController::class, 'update']);  

Route::get('/airlines', [AirlinesController::class, 'view']);

Route::get('/create-airlines', [AirlinesController::class, 'index']);

Route::post('/store-country-form', [CountriesController::class, 'store']);   

Route::post('/update-country-form', [CountriesController::class, 'update']);   

Route::post('/store-airlines-form', [AirlinesController::class, 'store']);  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/airport-unlink-airline/{id}', [AirportController::class, 'unlinkAirline'])->name('id.destroy');

Route::get('/country-delete/{id}', [CountriesController::class, 'destroy'])->name('id.destroy');

Route::get('/airport-delete/{id}', [AirportController::class, 'destroy'])->name('id.destroy');

Route::get('/airline-delete/{id}', [AirlinesController::class, 'destroy'])->name('id.destroy');

Route::get('/airline-delete/{id}', [AirlinesController::class, 'destroy'])->name('id.destroy');

Route::get('/search-country-form', [AirportController::class, 'searchCountry'])->name('id.destroy');
