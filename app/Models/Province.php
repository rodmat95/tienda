<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    
    //Relación Uno a Muchos
    public function districts()
    {
        return $this->hasMany(District::class);
    }
    
    //Relación Uno a Muchos Inversa
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    //Relación Uno a Muchos
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}