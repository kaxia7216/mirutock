<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Carbon\Carbon;

class StockController extends Controller
{
    //Stockテーブルの全件取得(条件なし)
    public function showAllStocks()
    {
        $diffDays = array();

        $stocks = Stock::all();

        //今日の日付と消費期限の差分を取得
        foreach ($stocks as $stock) {
            $limitDate = Carbon::parse($stock->limit);
            $today = Carbon::today();

            array_push($diffDays, $today->diffInDays($limitDate, false));
        }

        return view('stockList', compact('stocks', 'diffDays'));
    }

    //冷蔵のみのデータを取得
    public function showColdStocks()
    {
        $diffDays = array();

        $coldStocks = Stock::Where('type', 'cold')->get();

        //今日の日付と消費期限の差分を取得
        foreach ($coldStocks as $stock) {
            $limitDate = Carbon::parse($stock->limit);
            $today = Carbon::today();

            array_push($diffDays, $today->diffInDays($limitDate, false));
        }

        return view('stockList-cold', compact('coldStocks', 'diffDays'));
    }

    //冷凍のみのデータを取得
    public function showIceStocks()
    {
        $diffDays = array();

        $iceStocks = Stock::Where('type', 'ice')->get();

        //今日の日付と消費期限の差分を取得
        foreach ($iceStocks as $stock) {
            $limitDate = Carbon::parse($stock->limit);
            $today = Carbon::today();

            array_push($diffDays, $today->diffInDays($limitDate, false));
        }

        return view('stockList-ice', compact('iceStocks', 'diffDays'));
    }

    //食材データの新規登録
    public function insertStock(Request $request)
    {
        $limitDate = $request['limit-year'] . "-" . $request['limit-month'] . "-" . $request['limit-day'];

        $stock = new Stock();
        $stock->name = $request['name'];
        $stock->type = $request['select-type'];
        $stock->piece = $request['piece'];
        $stock->limit = $limitDate;
        $stock->save();

        return redirect('/stocks');
    }

    //IDを指定したStockデータ1件の全カラムの内容を更新
    public function editStockData(int $stockId, Request $request)
    {
        $editlimitDate = $request['limit-year'] . "-" . $request['limit-month'] . "-" . $request['limit-day'];

        $editStock = Stock::Where('id', $stockId);
        $editStock->update(['name' => $request['name']]);
        $editStock->update(['type' => $request['select-type']]);
        $editStock->update(['piece' => $request['piece']]);
        $editStock->update(['limit' => $editlimitDate]);

        return redirect('/stocks');
    }

    //対象の個数と期限のみを更新
    public function renewStockPieceAndLimit(int $stock_id, Request $request)
    {
        $renewlimitDate = $request['limit-year'] . "-" . $request['limit-month'] . "-" . $request['limit-day'];
        $restoreStock = Stock::firstWhere('id', $stock_id);
        $restoreStock->update(['piece' => $request['piece']]);
        $restoreStock->update(['limit' => $renewlimitDate]);
    }

    //Stockテーブルから1件削除
    public function deleteOneStock(int $stockId)
    {
        $stock = Stock::firstWhere('id', $stockId);
        $stock->delete();

        return redirect('/stocks');
    }
}
