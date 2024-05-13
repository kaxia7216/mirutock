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

    public function showColdStocks()
    {
        //
        return view('stockList-cold');
    }

    public function showIceStocks()
    {
        //
        return view('stockList-ice');
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

    //IDを指定したStockデータ1件を更新
    public function editStockData(int $stockId, Request $request)
    {
        $editlimitDate = $request['limit-year'] . "-" . $request['limit-month'] . "-" . $request['limit-day'];

        $editStock = Stock::Where('id', $stockId);
        $editStock->update(['name' => $request['name']]);
        $editStock->update(['type' => $request['select-type']]);
        $editStock->update(['piece' => $request['piece']]);
        $editStock->update(['unit' => $request['unit']]);
        $editStock->update(['limit' => $editlimitDate]);

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
