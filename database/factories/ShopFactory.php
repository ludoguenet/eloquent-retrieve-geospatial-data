<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $latitude = 43.116669;
        $longitude = 5.93333;

        return [
            'name' => fake()->company,
            'address' => fake()->address,
            'is_open' => fake()->boolean,
            'latitude' => fake()->latitude(
                ($latitude - (random_int(0,20) / 1000)),
                ($latitude + (random_int(0,20) / 1000))
            ),
            'longitude' => fake()->longitude(
                ($longitude - (random_int(0,20) / 1000)),
                ($longitude + (random_int(0,20) / 1000))
            ),
        ];
    }
}
