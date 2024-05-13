<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;

class ShopListController extends Controller
{
    public function showShopList()
    {
        return view('shopList');
    }
}
