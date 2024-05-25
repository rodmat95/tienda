<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
        $categoryID = Category::pluck('id')->toArray();
        $categories = $this->faker->randomElement($categoryID);
        */
        $categories = Category::all()->random()->id;
        $productName = ["Gorra azul", "Cuerda fitness",  "Camisa blanca", "Blusa blanca", "Pantalón de Vestir", "Linterna 50w", "Overol rojo", "Short negro", "Set de Ollas Antiadherentes", "Cremas para el Cuidado de la Piel", "Juego de Construcción para Niños", "Raqueta de Tenis Profesional", "Kit de Pintura al Óleo", "Llantas para Automóviles", "Caja de Selección de Té"];
        $products = $this->faker->unique()->randomElement($productName);
        $descriptions = $this->faker->unique()->text(250);
        $details = $this->faker->unique()->text(50);

        return [
            'category_id' => $categories,
            'name' => $products,
            'slug' => Str::slug($products),
            'description' => $descriptions,
            'detail' => $details,
        ];
    }
}
