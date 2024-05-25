<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user()->id;
        $shopping_cart_id = ShoppingCart::where('customer_id', $user)->value('id');
        $cartItems = CartItem::where('shopping_cart_id', $shopping_cart_id)->get();

        $subTotal = $cartItems->sum(function ($cartItem) {
            return $cartItem->distribution->price * $cartItem->quantity;
        });

        $igv = $subTotal * 0.18;
        
        return view('shopping_carts.index', compact('cartItems', 'subTotal', 'igv'));
    }

    public function deleteFromCart($cart_item_id)
    {
        if (Auth::user()) {
            $user = Auth::user()->id;
            $shopping_cart_id = ShoppingCart::where('customer_id', $user)->value('id');
        }

        CartItem::where('shopping_cart_id', $shopping_cart_id)
            ->where('id', $cart_item_id)
            ->delete();

        return redirect()->back();
    }
}
