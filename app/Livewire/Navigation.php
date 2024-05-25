<?php

namespace App\Livewire;

use App\Models\CartItem;
use Livewire\Component;
use App\Models\Category;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();

        $totalItems = null;

        if(Auth::user()){
            $user = Auth::user()->id;
            $shopping_cart_id = ShoppingCart::where('customer_id', $user)->value('id');
            $totalItems = CartItem::where('shopping_cart_id', $shopping_cart_id)->sum('quantity');
        }

        return view('livewire.navigation', compact('categories', 'totalItems'));
    }
}