<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ShopListController;

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

Route::get('/', [StockController::class, 'showAllStocks']);
Route::get('/cold', [StockController::class, 'showColdStocks']);
Route::get('/ice', [StockController::class, 'showIceStocks']);
Route::get('/shoplist', [ShopListController::class, 'showShopList']);
Route::post('/stock/new', [StockController::class, 'insertStock']);
Route::post('/stock/edit/{id}', [StockController::class, 'editStockData']);
Route::delete('/delete/stock/{stock_id}', [StockController::class, 'deleteOneStock']);
