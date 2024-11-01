<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Enum\UserStatus;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = [

        UserStatus::VENDOR->value,
        UserStatus::USER->value
    ];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            // 'password' => static::$password ??= Hash::make('password'),
            'password' => Hash::make('1234567'),
            'remember_token' => Str::random(10),
            'role_id' => Arr::random($roles)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    public function testUser()
    {
        return $this->state(fn (array $attributes)=>[

            'name' => 'Tester User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567'),
            'remember_token' => Str::random(10),
            'role_id'=> UserStatus::ADMIN->value
            
        ]);
    }
}
