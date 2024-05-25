<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $streets = $this->faker->streetName;
        $numbers = $this->faker->buildingNumber;
        $departments = Department::all()->random()->id;
        $provinces = Province::all()->random()->id;
        $districts = District::all()->random()->id;
        $postalCodes = $this->faker->numberBetween(10000, 99999);
        $references = $this->faker->unique()->sentence;

        return [
            'street' => $streets,
            'number' => $numbers,
            'department_id' => $departments,
            'province_id' => $provinces,
            'district_id' => $districts,
            'postal_code' => $postalCodes,
            'reference' => $references,
        ];
    }
}