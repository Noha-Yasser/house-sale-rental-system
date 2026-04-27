<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_name'=>fake()->city(),
            'street'=>fake()->streetName(),
            'country_id' => \App\Models\Country::inRandomOrder()->first()->id,
        ];
    }
}
