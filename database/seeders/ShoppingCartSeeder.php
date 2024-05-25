<?php

namespace Database\Seeders;

use App\Models\ShoppingCart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShoppingCart::factory(12)->create();
    }
}
