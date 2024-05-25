<?php

namespace Database\Seeders;

use App\Models\Distribution;
use App\Models\Product;
use App\Models\Image;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(15)->create();

        foreach ($products as $product) 
        {
            Image::factory(1)->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class,
            ]);

            /* $suppliers = Supplier::inRandomOrder()->get(); //->limit(5)

            foreach ($suppliers as $supplier) {
                //$product->suppliers()->attach($supplier, Distribution::factory()->make()->toArray());
                $distribution = Distribution::factory()->make();
                $distribution->slug = Str::slug($product->name) . '-' . $supplier->id;
                $product->suppliers()->attach($supplier, $distribution->toArray());
            } */
        }
    }
}