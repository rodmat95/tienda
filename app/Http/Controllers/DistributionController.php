<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Distribution;
use App\Models\Category;
use App\Models\ShoppingCart;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DistributionController extends Controller
{
    public function index()
    {
        if (request()->page){
            $key = 'distributions' . request()->page;
        } else {
            $key = 'distributions';
        }

        if (Cache::has($key)) {
            $distributions = Cache::get($key);
        } else {
            $distributions = Distribution::with('product', 'supplier')->where('status', 2)->where('stock', '!=', 0)->latest('id')->paginate(9);
            Cache::put($key, $distributions);
        }

        return view('distributions.index', compact('distributions'));
    }

    public function addToCart(Distribution $distribution)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user()->id;
        $shopping_cart_id = ShoppingCart::where('customer_id', $user)->value('id');

        $existingCartItem = CartItem::where('shopping_cart_id', $shopping_cart_id)
            ->where('distribution_id', $distribution->id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + 1,
            ]);
        } else {
            CartItem::create([
                'shopping_cart_id' => $shopping_cart_id,
                'distribution_id' => $distribution->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back();
    }

    public function show(Distribution $distribution)
    {
        $this->authorize('published', $distribution);

        $distribution->load('product', 'supplier');

        $otros = Distribution::where('supplier_id', $distribution->supplier_id)
            ->where('status', 2)
            ->where('stock', '!=', 0)
            ->where('id', '!=', $distribution->id)
            ->latest('id')
            ->take(4)
            ->get();

        $ofertas = Distribution::where('product_id', $distribution->product_id)
            ->where('status', 2)
            ->where('stock', '!=', 0)
            ->where('id', '!=', $distribution->id)
            ->latest('id')
            ->take(4)
            ->get();
        //dd($ofertas);

        $relacionados = Distribution::whereHas('product', function ($query) use ($distribution) {
            $query->where('category_id', $distribution->product->category_id);
        })
            ->where('status', 2)
            ->where('stock', '!=', 0)
            ->where('id', '!=', $distribution->id)
            ->latest('id')
            ->take(4)
            ->get();

        return view('distributions.show', compact('distribution', 'otros', 'ofertas', 'relacionados'));
    }

    public function category(Category $category)
    {
        $distributions = Distribution::whereHas('product', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })
            ->where('status', 2)
            ->latest('id')
            ->paginate(6);
        //dd($distributions);

        return view('distributions.category', compact('distributions', 'category'));
    }

    public function supplier(Supplier $supplier)
    {
        $distributions = Distribution::whereHas('product', function ($query) use ($supplier) {
            $query->where('supplier_id', $supplier->id);
        })
            ->where('status', 2)
            ->latest('id')
            ->paginate(6);
        dd($distributions);

        return view('distributions.supplier', compact('distributions', 'supplier'));
    }
}