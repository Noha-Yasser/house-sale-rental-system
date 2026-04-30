<?php

namespace Database\Factories;

use App\Models\transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_method' => fake() -> randomElement(['cash', 'card', 'paypal']),
            'amount' => fake() -> numberBetween(100, 10000),
            'status' => fake() -> randomElement(['pending', 'paid', 'failed']),
              'booking_id' => \App\Models\Booking::inRandomOrder()->first()->id ,
        ];
    }
}
