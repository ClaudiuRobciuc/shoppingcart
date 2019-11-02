<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FruitModel;
use App\CartModel;
use Session;

class IndexController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $cartProducts = CartModel::getTotalProducts($sessionId);
        $products = FruitModel::get();
        return view('pages.index',[
            'products' => $products,
            'cartProducts' => $cartProducts
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $amount = $request->only('amount')['amount'];
        $sessionId = Session::getId();
        $product = FruitModel::find($id);

        $cart = CartModel::firstOrNew(['product_id' => $product->id, 'sold' => NULL]);
        $cart->session_id = $sessionId;
        $cart->amount = $cart->amount + $amount;
        $cart->price = $cart->price + $amount * $product->price;
        $cart->save();

        return redirect()->back();
    }
}
