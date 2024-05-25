<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 
        'user_id', 
        'created_at', 
        'updated_at'
    ];
    
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relación Muchos a Muchos
    public function products()
    {
        return $this->belongsToMany(Product::class, 'distributions')
            ->withPivot('price', 'stock')
            ->withTimestamps();
    }

    //Relación Uno a Muchos Inversa
    public function Commission()
    {
        return $this->belongsTo(Commission::class);
    }
    
    //Relación Uno a Uno
    public function Users()
    {
        return $this->belongsTo(User::class);
    }

    //Relación Polimorfa Uno a Uno
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}