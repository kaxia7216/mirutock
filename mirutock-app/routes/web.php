<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ShopListController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::controller(StockController::class)->group(function () {
    Route::get('/', 'showAllStocks');
    Route::get('/cold', 'showColdStocks');
    Route::get('/ice', 'showIceStocks');
    Route::post('/stock/new', 'insertStock');
    Route::post('/stock/edit/{id}', 'editStockData');
    Route::delete('/delete/stock/{stock_id}', 'deleteOneStock');
});

Route::controller(ShopListController::class)->group(function () {
    Route::get('/shoplist', 'showShopList');
    Route::post('/reload', 'rebuildShopLists');
    Route::post('/shoplist/renew/{shopList_id}', 'restoreToStock');
    Route::delete('/delete/shopList/{shopList_id}', 'deleteOneShopList');
});
