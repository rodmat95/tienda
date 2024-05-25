<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    //Relación Uno a Muchos Inversa
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    //Relación Uno a Muchos Inversa
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    //Relación Uno a Muchos Inversa
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    //Relación Polimorfa
    public function addressable()
    {
        return $this->morphTo();
    }
}