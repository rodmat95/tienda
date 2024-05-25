<?php

namespace Database\Seeders;

use App\Models\Commission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commission::create([
            'type' => 'DNI',
            'rate' => '20',
            'slug' => 'dni',
        ]);

        Commission::create([
            'type' => 'RUC 10 SIN NEGOCIO',
            'rate' => '15',
            'slug' => 'ruc-sin-negocio',
        ]);

        Commission::create([
            'type' => 'RUC 10 CON NEGOCIO',
            'rate' => '10',
            'slug' => 'ruc-con-negocio',
        ]);
        
        Commission::create([
            'type' => 'RUC 20',
            'rate' => '5',
            'slug' => 'ruc',
        ]);
    }
}