<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\City;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        // تأكد من وجود مدينة واحدة على الأقل (باستخدام الأسماء الصحيحة للأعمدة)
        $defaultCity = City::firstOrCreate(
            ['id' => 1],
            [
                'city_name' => 'Default City',  // city_name مش name
                 'street' => 'Default Street',
                'country_id' => 1
            ]
        );

        Company::factory(10)->create()->each(function ($company) use ($defaultCity) {
            User::create([
                'name' => $company->email,
                'phone' => fake()->phoneNumber(),
                'image' => fake()->imageUrl(100, 100, 'people', true, 'avatar'),
                'address' => fake()->address(),
                'city_id' => $defaultCity->id,  // هذا صحيح
                'actor_id' => $company->id,
                'actor_type' => Company::class,
            ]);
        });
    }
}