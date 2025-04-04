<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
    
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}