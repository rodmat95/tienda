<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userID = Auth::user()->id;
        $shopping_cart_id = ShoppingCart::where('customer_id', $userID)->value('id');
        $cartItems = CartItem::where('shopping_cart_id', $shopping_cart_id)->get();

        $subTotal = $cartItems->sum(function ($cartItem) {
            return $cartItem->distribution->price * $cartItem->quantity;
        });

        $igv = $subTotal * 0.18;

        $department = Department::get();
        $province = Province::get();
        $district = District::get();

        return view('sales.index', compact('cartItems', 'subTotal', 'igv', 'department', 'province', 'district'));
    }

    public function getProvinces($departmentId)
    {
        // Fetch provinces based on the selected department
        $provinces = Province::where('department_id', $departmentId)->get();

        return response()->json($provinces);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Address::create($request->all());
        Sale::create($request->all());

        return redirect()->view('recibos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
