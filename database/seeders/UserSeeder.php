<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rodrigo Chavarry',
            'email' => 'rodrigo@tienda.pe',
            'password' => bcrypt('administrador'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Diego Dioses',
            'email' => 'diego@tienda.pe',
            'password' => bcrypt('empleado'),
        ])->assignRole('Empleado');

        /* User::factory(4)->create(); */
    }
}