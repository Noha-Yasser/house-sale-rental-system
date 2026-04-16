<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { $companies = [
            [
                'company_name' => 'Elite Real Estate',
                'address' => 'Ramallah, Palestine',
                'description' => 'Luxury properties and premium real estate services since 2010.',
                'website' => 'https://elite-realestate.ps',
                'rating' => 4.8,
            ],
            [
                'company_name' => 'HomeFinder',
                'address' => 'Gaza, Palestine',
                'description' => 'Your trusted partner for finding the perfect home.',
                'website' => 'https://homefinder.ps',
                'rating' => 4.5,
            ],
            [
                'company_name' => 'Cairo Properties',
                'address' => 'Cairo, Egypt',
                'description' => 'Best properties in Cairo with competitive prices.',
                'website' => 'https://cairoproperties.com',
                'rating' => 4.2,
            ],
            [
                'company_name' => 'Dubai Realty',
                'address' => 'Dubai, UAE',
                'description' => 'Luxury living in the heart of Dubai.',
                'website' => 'https://dubairealty.ae',
                'rating' => 4.9,
            ],
            [
                'company_name' => 'Riyadh Homes',
                'address' => 'Riyadh, Saudi Arabia',
                'description' => 'Affordable homes and modern apartments.',
                'website' => 'https://riyadh-homes.sa',
                'rating' => 4.3,
            ],
        ];

        foreach ($companies as $company) {
         //  companies::create($company);
        }
    }
}
