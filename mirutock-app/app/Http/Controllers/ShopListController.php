<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;
use App\Models\Stock;
use Carbon\Carbon;

class ShopListController extends Controller
{
    public function showShopList()
    {
        $shopLists = ShoppingList::join('stocks', 'shoppinglists.stock_id', '=', 'stocks.id')->get();
        // dd($shopLists);
        return view('shopList', compact('shopLists'));
    }

    public function rebuildShopLists()
    {
        //reloadボタンを押したとき
        $this->createShopLists();
        return view('shopList');
    }

    public function createShopLists()
    {
        //ShopListデータ作成処理
        $shopList = ShoppingList::all();

        if (!$shopList->isEmpty()) {
            //レコードをリセットしたいため、全件削除
            ShoppingList::query()->delete();
        }

        //Stockテーブルのlimitカラムとpieceカラムから、買い物リストを作成
        $stocks = Stock::all();
        $today = Carbon::today();

        foreach ($stocks as $stock) {
            $limitDate = Carbon::parse($stock->limit);
            $difflimitDate = $today->diffInDays($limitDate, false);

            //limitカラムの日付が残り1日以下、またはpieceカラムが1以下
            if ($difflimitDate <= 1 || $stock->piece <= 1) {
                $newShopList = new ShoppingList();
                $newShopList->stock_id = $stock->id;
                $newShopList->save();
            }
        }
    }
}
