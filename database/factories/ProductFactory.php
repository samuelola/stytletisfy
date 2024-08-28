<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $availability = [
        'available',
        'not available', 
    ];
        return [
            'title' => fake()->words(6, true),
            'description'=> fake()->text(),
            'price' => random_int(100,1000),
            'uuid'     => Str::uuid(),
            'image'    => 'https://source.unsplash.com/random',
            'size'     => random_int(100,500),
            'product_rating'  => random_int(1,5),
            'stock_qty' => random_int(1,100),
            'stock_status' => Arr::random($availability),
            'user_id'      => random_int(1,20),
            'category_id'  => random_int(1,5),
            'sub_category_id' => random_int(1,77),
            'sku' => 'S'.random_int(100000,999999),
            'reviews'=> fake()->text(),
            'products_multiple_image_id' => random_int(1,100),
            'offer_date' => Carbon::instance(fake()->dateTimeBetween('-1 months','+1 months')) 
        ];
    }
}
