<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use App\Models\City;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        
        $defaultCity = City::firstOrCreate(
            ['id' => 1],
            [
                'city_name' => 'Default City',  
                 'street' => 'Default Street',
                'country_id' => 1
            ]
        );

        Customer::factory(10)->create()->each(function ($customer) use ($defaultCity) {
            User::create([
                'name' => $customer->email,
                'phone' => fake()->phoneNumber(),
                'image' => fake()->imageUrl(100, 100, 'people', true, 'avatar'),
                'address' => fake()->address(),
                'city_id' => $defaultCity->id,  
                'actor_id' => $customer->id,
                'actor_type' => Customer::class,
            ]);
        });
    }
}