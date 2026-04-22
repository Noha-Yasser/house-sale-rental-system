<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          
            'email' => $this->faker->unique()->companyEmail(),
            'password' => bcrypt('password'),
            'description' => $this->faker->paragraph(3),
            'website' => $this->faker->url(),
            'rating' => $this->faker->randomFloat(1, 0, 5),
        ];
    }
}
