<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),

            'description' => fake()->text(20),

            'price' => fake()->randomFloat(2, 50000, 500000),

            'type' => fake()->randomElement(['apartment', 'house', 'villa']),

            'bedrooms' => fake()->numberBetween(1, 6),

            'area' => fake()->numberBetween(50, 500), 

            'bathrooms' => fake()->numberBetween(1, 4),

            'views_count' => fake()-> numberBetween(0, 1000),

            'address' => fake()->streetAddress(),

          'company_id' => \App\Models\company::inRandomOrder()->first()->id,

            'zip_code' => fake()->postcode(),

            'status' => fake()->randomElement(['available', 'sold', 'pending']),

            'photo' => fake()->imageUrl(640, 480, 'house', true ),

            'services' => fake()->sentence(2),
            'unique_feature' => fake()->sentence(2),
    ];
    }
}
