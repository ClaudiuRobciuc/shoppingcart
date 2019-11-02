<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FruitModel;
use App\CartModel;
use App\ShopSnapshotModel;
use Session;

class ShopController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $cartProducts = CartModel::getProducts($sessionId)->get();
        
        $total = $cartProducts->sum('price');

        return view('pages.shoppingcart',[
            'cartProducts' => $cartProducts,
            'total' => $total
        ]);
    }

    public function removeItem(Request $request)
    {
        $cartRow = $request->only('row_id')['row_id'];
        CartModel::destroy($cartRow);
        return redirect()->back();
    }

    public function buyCart(Request $request)
    {
        $sessionId = Session::getId();
        $cartProducts = CartModel::getProducts($sessionId);
        $cartProducts->update(['sold' => 1]);
        $cartProducts = $cartProducts->get();

        $shopSnap = new ShopSnapshotModel();
        $shopSnap->session_id = $sessionId;
        $shopSnap->total_price = $request->only('total')['total'];
        $shopSnap->status = 1;
        $shopSnap->save();
        
        Session::flash('success', 'Cart bought!');
        return redirect()->intended('/');
    }
}
