<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopListRequest;
use App\Models\ShoppingList;
use App\Models\Stock;
use Carbon\Carbon;
use App\Http\Controllers\StockController;

class ShopListController extends Controller
{
    public function showShopList()
    {
        $shopLists = Stock::join('shoppinglists', 'stocks.id', '=', 'shoppinglists.stock_id')->get();
        return view('shopList', compact('shopLists'));
    }

    public function rebuildShopLists()
    {
        //reloadボタンを押したときのみ
        $this->createShopLists();
        return redirect('/shoplist');
    }

    //ShopListデータ作成処理
    public function createShopLists()
    {
        $shopList = ShoppingList::all();

        if (!$shopList->isEmpty()) {
            //レコードをリセットしたいため、全件削除
            ShoppingList::query()->delete();
        }

        //Stockテーブルのlimitカラムとpieceカラムから、買い物リストを作成
        $stocks = Stock::all();
        $today = Carbon::today();

        foreach ($stocks as $stock) {
            if ($stock->limit !== null) {
                $limitDate = Carbon::parse($stock->limit);
                $difflimitDate = $today->diffInDays($limitDate, false);
            }

            //limitカラムの日付が残り1日以下、またはpieceカラムが1以下
            if (($stock->limit !== null && $difflimitDate <= 1) || $stock->piece <= 1) {
                $newShopList = new ShoppingList();
                $newShopList->stock_id = $stock->id;
                $newShopList->save();
            }
        }
    }

    //Stockテーブルへ食材データの更新、および買い物リストからの削除
    public function restoreToStock(int $shopList_id, ShopListRequest $request)
    {
        $renewShopList = ShoppingList::firstWhere('id', $shopList_id);

        $stockController = new StockController();
        $stockController->renewStockPieceAndLimit($renewShopList->stock_id, $request);

        $renewShopList->delete();

        return redirect('/shoplist');
    }

    //買い物リストから１件レコードを削除
    public function deleteOneShopList(int $shopList_id)
    {
        $deleteShopList = ShoppingList::firstWhere('id', $shopList_id);
        $deleteShopList->delete();

        return redirect('/shoplist');
    }
}
