<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id', 
        'customer_id'
    ];

    //Relación Uno a Muchos
    public function cartItem()
    {
        return $this->hasMany(CartItem::class);
    }
    
    //Relación Uno a Uno
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}