<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;   
    
    protected $fillable = [
        'phone',
        'user_id'
    ]; 
    
    //Relación Uno a Uno
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class);
    }
}