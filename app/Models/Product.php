<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at'
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }
    
    //Relación Muchos a Muchos
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'distributions')
            ->withPivot('price', 'stock')
            ->withTimestamps();
    }

    //Relación Uno a Muchos Inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relación Polimorfa Uno a Uno
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}