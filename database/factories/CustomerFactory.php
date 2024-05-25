<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $counter = 2;

        $users = $counter++;
        //$userID = User::orderBy('id')->pluck('id')->first();
        //$users = array_shift($userID);
        $phones = $this->faker->phoneNumber;

        return [
            'user_id' => $users,
            'phone' => $phones,
        ];
    }
}