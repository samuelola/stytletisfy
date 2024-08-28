<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             "user_id" => random_int(1,20),
             "product_id"  => random_int(1,100),
             "qty" => random_int(1,400),
             "price" => random_int(100,1000)
        ];
    }
}
