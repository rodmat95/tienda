<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    //Relación Uno a Muchos
    public function saleDetail()
    {
        return $this->hasMany(saleDetail::class);
    }
}
