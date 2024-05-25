<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MiniCart extends Component
{
    public function render()
    {
        $cartItems = null;

        if (Auth::user()) {
            $user = Auth::user()->id;
            $shopping_cart_id = ShoppingCart::where('customer_id', $user)->value('id');
            $cartItems = CartItem::where('shopping_cart_id', $shopping_cart_id)->get();
        }

        return view('livewire.mini-cart', compact('cartItems'));
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
    }
}