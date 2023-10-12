<?php

namespace Database\Factories\Modules\Country;

use App\Modules\Country\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name:en' => fake()->country(),
            'name:ar' => fake('ar')->country(),
            'currency_code:en' => fake()->currencyCode(),
            'currency_code:ar' => fake('ar')->currencyCode(),
            'country_code' => fake()->unique()->countryCode(),
            'is_active' => true,
        ];
    }
}
