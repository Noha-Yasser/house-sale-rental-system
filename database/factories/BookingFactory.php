<?php

namespace Database\Factories;
use App\Models\Customer;
use App\Models\Property;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'booking_date' => $this->faker->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
            'booking_time' => $this->faker->time('H:i:s'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'note' => $this->faker->optional()->sentence(5),
            'customer_id' => Customer::inRandomOrder()->first()?->id ?? Customer::factory(),
            'property_id' => Property::inRandomOrder()->first()?->id ?? Property::factory(),
            'created_at' => now(),
            'updated_at' => now(),
     
        ];
    }
}
