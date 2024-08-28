<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kyc>
 */
class KycFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'  => random_int(1,20),
            'team_size'  => random_int(1,20),
            'business_name' => fake()->company,
            'business_description'=> fake()->text(),
            'corporation_type'=> fake()->city,
            'contact_email'=> fake()->companyEmail,
            'contact_address'=> fake()->streetAddress,
            'phone_number'   => fake()->phoneNumber,
        ];
    }
}
