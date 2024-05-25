<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
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

    //Relación Uno a Muchos
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}