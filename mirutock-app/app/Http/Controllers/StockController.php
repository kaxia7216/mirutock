<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    //Stockテーブルの全件取得(条件なし)
    public function showAllStocks()
    {
        $stocks = Stock::all();

        return view('stockList', compact('stocks'));
    }
}
