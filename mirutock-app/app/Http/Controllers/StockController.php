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

    //食材データの新規登録
    public function insertStock(Request $request)
    {
        $limitDate = $request['limit-year'] . "-" . $request['limit-month'] . "-" . $request['limit-day'];

        $stock = new Stock();
        $stock->name = $request['name'];
        $stock->type = $request['select-type'];
        $stock->piece = $request['piece'];
        $stock->unit = $request['unit'];
        $stock->limit = $limitDate;
        $stock->save();

        return redirect('/');
    }

    //Stockテーブルから1件削除
    public function deleteOneStock(int $stockId)
    {
        $stock = Stock::firstWhere('id', $stockId);
        $stock->delete();

        return redirect('/');
    }
}
