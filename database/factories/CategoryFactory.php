<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryName = ['Electrónica', 'Ropa', 'Hogar', 'Deportes', 'Libros', 'Juguetes', 'Música', 'Alimentos', 'Salud', 'Belleza'];
        $categories = $this->faker->unique()->randomElement($categoryName);

        return [
            'name' => $categories,
            'slug' => Str::slug($categories),
        ];
    }
}