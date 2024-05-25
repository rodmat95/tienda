<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_cart_id',
        'distribution_id',
        'quantity'
    ];


    //Relación Uno a Muchos Inversa
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class);
    }

    public function distribution()
    {
        return $this->belongsTo(Distribution::class);
    }
}
