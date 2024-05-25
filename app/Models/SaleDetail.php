<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    
    //Relación Uno a Muchos Inversa
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}