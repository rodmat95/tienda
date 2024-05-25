<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        //$this->call(RoleSeeder::class);
        
        $this->call(DepartmentSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        //$this->call(AddressSeeder::class);

        //$this->call(ImageSeeder::class);

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

        $this->call(CommissionSeeder::class);
        $this->call(SupplierSeeder::class);

        $this->call(DistributionSeeder::class);

        $this->call(CustomerSeeder::class);
        $this->call(ShoppingCartSeeder::class);
    }
}