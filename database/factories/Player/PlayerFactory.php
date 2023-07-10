<?php

namespace Database\Factories\Player;

use App\Models\Country\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player\Player>
 */
class PlayerFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18,40),
            'value' => 1_000_000,
            'country_id' =>  Country::inRandomOrder()->value('id')
        ];
    }
}
