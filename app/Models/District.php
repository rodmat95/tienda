<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    
    //Relación Uno a Muchos Inversa
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    
    //Relación Uno a Muchos
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}