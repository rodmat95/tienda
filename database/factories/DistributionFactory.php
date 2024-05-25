<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distribution>
 */
class DistributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $suppliers = Supplier::inRandomOrder()->first();
        $products = Product::inRandomOrder()->first();
        $slugs = Str::slug($products->name . '-' . $suppliers->id);
        $prices = $this->faker->randomFloat(2, 5, 50);
        $stocks = $this->faker->numberBetween(5, 100);

        return [
            'supplier_id' => $suppliers,
            'product_id' => $products,
            'slug' => $slugs,
            'price' => $prices,
            'stock' => $stocks,
        ];
    }
}