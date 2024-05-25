<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\Address;
use App\Models\Distribution;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier1 = Supplier::create([
            'id' => 1,
            'name' => 'Importaciones Rodrigo S.L.R.',
            'slug' => 'importaciones-rodrigo-s-l-r',
            'commission_id' => 4,
            'user_id' => 1,
        ]);

        $suppliers = Supplier::factory(10)->create();

        $suppliers->push($supplier1);

        foreach ($suppliers as $supplier) {
            Address::factory(1)->create([
                'addressable_id' => $supplier->id,
                'addressable_type' => Supplier::class,
            ]);

            /* $products = Product::inRandomOrder()->limit(4)->get();

            foreach ($products as $product) {
                //$supplier->products()->attach($product, Distribution::factory()->make()->toArray());
                $distribution = Distribution::factory()->make();
                $distribution->slug = Str::slug($product->name) . '-' . $supplier->id;
                $supplier->products()->attach($product, $distribution->toArray());
            } */
        }
    }
}