<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Distribution extends Pivot
{
    use HasFactory;
    
    protected $table = 'distributions';

    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at'
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function cartItem()
    {
        return $this->hasMany(CartItem::class);
    }
}